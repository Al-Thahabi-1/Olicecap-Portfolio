<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Twilio\Rest\Client as TwilioClient;

class WhatsAppController extends Controller
{
    private string $systemPrompt = <<<PROMPT
You are a helpful assistant for Olivecap Studio, a web development studio. Answer visitor questions about our services clearly and professionally. Keep replies short and friendly — suitable for WhatsApp. Reply in the same language the user writes in (Arabic or English).

Our services:
1. Business Website — Full multi-page website. Clean design, fast, mobile-first.
2. Product Catalog Page — Showcase products/services in a structured catalog.
3. QR Menu Page — Digital menu for restaurants and cafes, accessible via QR code.
4. WhatsApp / Order Page — One-page order form that sends orders directly to WhatsApp.
5. Campaign Landing Page — High-converting landing page for promotions or product launches.
6. Custom Laravel Websites — Tailored Laravel-based websites for performance and scalability.
7. Admin Panels & Dashboards — Secure dashboards for managing content, products, bookings.
8. Booking & Request Systems — Simple booking/inquiry systems for clinics and service businesses.
9. Cross-Platform Mobile Apps — Android and iOS apps built with Flutter.
10. AI WhatsApp Chatbot — AI-powered bot that replies to customers 24/7.
11. Online Booking Calendar — Digital booking system with automatic WhatsApp/SMS reminders.
12. Google Reviews Automation — Automatically asks happy customers to leave a Google review.
13. Auto Social Media Posting — Schedule and auto-post content across Instagram, Facebook, TikTok.

If someone wants to start a project or ask for pricing, tell them to contact us at: fares119.fh@gmail.com
Do not invent prices. Do not answer questions unrelated to our services.
PROMPT;

    public function handle(Request $request)
    {
        $from = $request->input('From');
        $body = trim($request->input('Body', ''));

        if (empty($body) || empty($from)) {
            return response('', 200);
        }

        $reply = $this->findInFaq($body) ?? $this->askClaude($body);
        $this->sendWhatsApp($from, $reply);

        return response('', 200);
    }

    private function findInFaq(string $userMessage): ?string
    {
        $faqPath = database_path('faq.json');

        if (!file_exists($faqPath)) {
            return null;
        }

        $faqs    = json_decode(file_get_contents($faqPath), true) ?? [];
        $message = mb_strtolower($userMessage);

        foreach ($faqs as $item) {
            $question = mb_strtolower($item['q']);

            // Check if user message matches question keywords or tags
            $words = array_filter(explode(' ', $question), fn($w) => mb_strlen($w) > 2);

            $matchCount = 0;
            foreach ($words as $word) {
                if (str_contains($message, $word)) {
                    $matchCount++;
                }
            }

            // Also check tags
            foreach ($item['tags'] as $tag) {
                if (str_contains($message, mb_strtolower($tag))) {
                    $matchCount += 2;
                }
            }

            // Match if more than 30% of key words are found
            $threshold = max(1, count($words) * 0.3);
            if ($matchCount >= $threshold) {
                return $item['a'];
            }
        }

        return null;
    }

    private function askClaude(string $userMessage): string
    {
        $response = Http::withHeaders([
            'x-api-key'         => config('services.claude.key'),
            'anthropic-version' => '2023-06-01',
            'content-type'      => 'application/json',
        ])->post('https://api.anthropic.com/v1/messages', [
            'model'      => 'claude-haiku-4-5-20251001',
            'max_tokens' => 300,
            'system'     => $this->systemPrompt,
            'messages'   => [
                ['role' => 'user', 'content' => $userMessage],
            ],
        ]);

        if ($response->failed()) {
            return "عذراً، هناك مشكلة تقنية حالياً. تواصل معنا على: fares119.fh@gmail.com";
        }

        return $response->json('content.0.text', "لم أفهم سؤالك، هل يمكنك إعادة الصياغة؟");
    }

    private function sendWhatsApp(string $to, string $message): void
    {
        $twilio = new TwilioClient(
            config('services.twilio.sid'),
            config('services.twilio.token')
        );

        $twilio->messages->create($to, [
            'from' => 'whatsapp:' . config('services.twilio.whatsapp_number'),
            'body' => $message,
        ]);
    }
}
