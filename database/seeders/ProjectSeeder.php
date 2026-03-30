<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'AirIdeal',
                'description' => 'Built a full-featured accounting SaaS with modules for invoicing, expense management, financial reporting, and multi-role access control. Designed for SMEs needing structured financial oversight without enterprise overhead.',
                'technologies' => ['Laravel', 'TALL Stack', 'MySQL', 'Tailwind CSS', 'RBAC'],
                'likes' => rand(200, 1200),
                'type' => 'Accounting & Business Management SaaS',
                'is_featured' => true,
                'order' => 1,
                'github_url' => null,
                'demo_url' => null,
            ],
            [
                'title' => 'Bali Jewels',
                'description' => 'Developed a polished e-commerce storefront for a jewelry brand. Features include product catalog management, shopping cart, order tracking, and payment integration with a clean admin dashboard for inventory control.',
                'technologies' => ['Laravel', 'MySQL', 'Blade', 'Tailwind CSS', 'Payment Gateway'],
                'likes' => rand(200, 1200),
                'type' => 'E-commerce / Jewelry Retail',
                'is_featured' => true,
                'order' => 2,
                'github_url' => null,
                'demo_url' => null,
            ],
            [
                'title' => 'Tourism Booking Platform',
                'description' => 'Built an end-to-end booking management system for a Dubai-based tourism company offering hot-air balloon rides. Includes real-time availability, booking flows, secure payment processing, and an admin dashboard for managing tours and customer data.',
                'technologies' => ['Laravel', 'MySQL', 'Blade', 'Tailwind CSS', 'Stripe/PayPal'],
                'likes' => rand(200, 1200),
                'type' => 'Tourism & Activity Booking / Dubai',
                'is_featured' => true,
                'order' => 3,
                'github_url' => null,
                'demo_url' => null,
            ],
            [
                'title' => '911 Limo App',
                'description' => 'Real-time ride-sharing backend with location tracking, driver-passenger matching, trip management, and push notifications.',
                'technologies' => ['Laravel', 'Firebase', 'Real-time', 'Maps API'],
                'likes' => rand(200, 1200),
                'type' => 'Ride Sharing Platform',
                'is_featured' => true,
                'order' => 4,
                'github_url' => null,
                'demo_url' => null,
            ],
            [
                'title' => 'Careeros',
                'description' => 'Career-focused SaaS platform featuring resume parsing, ATS scanner, auto job applying workflows, and resume creation tools with subscription billing and multi-role access.',
                'technologies' => ['Laravel', 'TALL Stack', 'MySQL', 'Tailwind CSS', 'Livewire'],
                'likes' => rand(200, 1200),
                'type' => 'Career Development SaaS',
                'is_featured' => true,
                'order' => 5,
                'github_url' => null,
                'demo_url' => null,
            ],
            [
                'title' => 'Ezanias TMS',
                'description' => 'Built a tenant-based Truck Management System for a Canadian logistics company with Bill of Lading automation, real-time operations, role-based access control, and full audit logging.',
                'technologies' => ['Laravel', 'MySQL', 'REST APIs', 'RBAC', 'AWS', 'Tailwind CSS'],
                'likes' => rand(200, 1200),
                'type' => 'Logistics & Truck Management SaaS',
                'is_featured' => true,
                'order' => 6,
                'github_url' => null,
                'demo_url' => null,
            ],
            [
                'title' => 'ANR Inventory System',
                'description' => 'Comprehensive inventory and ERP-style management system for SMEs, covering stock tracking, purchase and sales orders, supplier management, and operational reporting.',
                'technologies' => ['Laravel', 'MySQL', 'Blade', 'Tailwind CSS', 'RBAC'],
                'likes' => rand(200, 1200),
                'type' => 'Inventory & ERP / SME Operations',
                'is_featured' => true,
                'order' => 7,
                'github_url' => null,
                'demo_url' => null,
            ],
            [
                'title' => 'Lumenialab',
                'description' => 'Corporate website for Lumenialab software house built with Next.js for performance and SEO. Includes service showcase, portfolio sections, and lead generation.',
                'technologies' => ['Next.js', 'React', 'Tailwind CSS', 'JavaScript'],
                'likes' => rand(200, 1200),
                'type' => 'Software House / Agency Website',
                'is_featured' => true,
                'order' => 8,
                'github_url' => null,
                'demo_url' => null,
            ],
            [
                'title' => 'Master Identity Provider (IdP)',
                'description' => 'Architected and built a master Identity Provider enabling tenant-based SSO across reseller portals with centralized authentication, session management, and secure token issuance.',
                'technologies' => ['Laravel', 'OAuth2', 'SSO', 'MySQL', 'REST APIs', 'Multi-Tenant Architecture'],
                'likes' => rand(200, 1200),
                'type' => 'Authentication & Identity / SaaS Infrastructure',
                'is_featured' => true,
                'order' => 9,
                'github_url' => null,
                'demo_url' => null,
            ],
            [
                'title' => 'Meedan',
                'description' => 'Full-featured food ordering website for the Canadian market with menu browsing, online orders, reservations, and a complete admin portal for dishes, categories, discounts, orders, and customers.',
                'technologies' => ['Laravel', 'TALL Stack', 'Livewire', 'Alpine.js', 'Tailwind CSS', 'MySQL'],
                'likes' => rand(200, 1200),
                'type' => 'Food Ordering & Restaurant Management',
                'is_featured' => true,
                'order' => 10,
                'github_url' => null,
                'demo_url' => 'https://meedan.ca',
            ],
            [
                'title' => 'Navicosoft Reseller Portal',
                'description' => 'WHMCS-style multi-tenant reseller platform for domains, hosting, subscriptions, billing, and provisioning with registrar integrations and AI-powered domain discovery.',
                'technologies' => ['Laravel', 'Blade', 'Livewire', 'Alpine.js', 'Tailwind CSS', 'REST APIs', 'Multi-Tenant Architecture'],
                'likes' => rand(200, 1200),
                'type' => 'Hosting SaaS / Reseller Management Platform',
                'is_featured' => true,
                'order' => 11,
                'github_url' => null,
                'demo_url' => null,
            ],
            [
                'title' => 'Satradelink',
                'description' => 'B2B industrial marketplace connecting yarn producers and raw material suppliers with garment manufacturers for textile and garment sourcing workflows.',
                'technologies' => ['Laravel', 'MySQL', 'Blade', 'Tailwind CSS', 'REST APIs'],
                'likes' => rand(200, 1200),
                'type' => 'B2B Industrial Marketplace / Textile',
                'is_featured' => true,
                'order' => 12,
                'github_url' => null,
                'demo_url' => 'https://satradelink.com',
            ],
            [
                'title' => 'Vendor Shendor',
                'description' => 'Zero-commission multi-vendor SaaS for the Pakistani market where vendors can sign up and launch fully customizable stores with dynamic theming and automated onboarding.',
                'technologies' => ['Laravel', 'TALL Stack', 'Livewire', 'Alpine.js', 'Tailwind CSS', 'MySQL', 'Multi-Tenant Architecture'],
                'likes' => rand(200, 1200),
                'type' => 'Multi-Vendor E-commerce SaaS',
                'is_featured' => true,
                'order' => 13,
                'github_url' => null,
                'demo_url' => 'https://vendorshendor.com',
            ],
        ];

        $validTitles = array_column($projects, 'title');
        Project::query()->whereNotIn('title', $validTitles)->delete();

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['title' => $project['title']],
                $project
            );
        }
    }
}
