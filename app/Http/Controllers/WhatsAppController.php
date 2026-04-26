<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Twilio\Rest\Client as TwilioClient;

class WhatsAppController extends Controller
{
    private string $systemPrompt = <<<PROMPT
You are a helpful assistant for Olivecap Studio, a web development studio. Answer visitor questions about our services clearly and professionally. Keep replies short and friendly — suitable for WhatsApp.

Our services:
1. Business Website — Full multi-page website. Clean design, fast, mobile-first, built to impress clients and rank in search.
2. Product Catalog Page — Showcase products/services in a structured catalog. Great for furniture stores, retail, and service providers.
3. QR Menu Page — Digital menu for restaurants and cafes, accessible via QR code. No app needed.
4. WhatsApp / Order Page — One-page order form that sends orders directly to WhatsApp. Great for fast conversions.
5. Campaign Landing Page — High-converting landing page for promotions or product launches.
6. Custom Laravel Websites — Tailored Laravel-based websites for performance, flexibility, and long-term scalability.
7. Admin Panels & Dashboards — Secure dashboards for managing content, products, bookings, or internal data.
8. Booking & Request Systems — Simple booking/inquiry systems for clinics, service businesses, and local brands.
9. Cross-Platform Mobile Apps — Android and iOS apps built from a single codebase.

If someone wants to start a project or ask for pricing, tell them to contact us at: fares119.fh@gmail.com
Do not invent prices. Do not answer questions unrelated to our services.
PROMPT;

    public function handle(Request $request)
    {
        $from    = $request->input('From');
        $body    = trim($request->input('Body', ''));

        if (empty($body) || empty($from)) {
            return response('', 200);
        }

        $reply = $this->askClaude($body);
        $this->sendWhatsApp($from, $reply);

        return response('', 200);
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
            return "Sorry, I'm having trouble right now. Please contact us at fares119.fh@gmail.com";
        }

        return $response->json('content.0.text', "I didn't understand that. Could you rephrase?");
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
