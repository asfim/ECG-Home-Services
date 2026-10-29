<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use App\Models\CoverageArea;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\PricingPlan;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@cardiohome.com.bd'],
            [
                'name' => 'CardioHome Admin',
                'password' => Hash::make('admin123'),
            ]
        );

        // 2. Site Settings
        $settings = [
            'site_name' => 'CardioHome',
            'site_title' => 'ECG Home Service in Mohammadpur, Dhaka | 24/7 Home ECG Test',
            'meta_description' => 'ECG home service in Mohammadpur, Dhaka. Book a 12-lead ECG test at home from ৳800 — technician arrives in 30 minutes, cardiologist-reviewed report on WhatsApp. Open 24/7.',
            'meta_keywords' => 'ECG home service, ECG home service Dhaka, ECG home service Mohammadpur, home ECG test, ECG at home, ECG test at home Dhaka, home ECG service near me, ECG home service price in Dhaka, 24 hour ECG home service, বাসায় ইসিজি, ইসিজি হোম সার্ভিস, বাসায় ইসিজি টেস্ট ঢাকা',
            'author' => 'CardioHome',
            'canonical_url' => 'https://cardiohome.com.bd/',
            'logo' => 'images/logo.png',
            'favicon' => 'images/logo.png',
            'hotline_phone' => '01348-223547',
            'tel_phone' => '+8801348223547',
            'whatsapp_number' => '8801348223547',
            'email' => 'care@cardiohome.com.bd',
            'address' => 'Tajmahal Road, Mohammadpur, Dhaka-1207',
            'working_hours' => 'Open 24 hours, 7 days',
            'base_office_title' => 'Tajmahal Road, Mohammadpur, Dhaka-1207',
            'gallery_callout_text' => 'জরুরি ওটি সি-আর্ম ও ডিজিটাল পোর্টেবল এক্স-রে সার্ভিসের জন্য সরাসরি হটলাইনে যোগাযোগ করুন:',
            'gallery_callout_name' => '01348-223547 (মো: শরিফ)',
            'gallery_callout_tel' => '+8801348223547',
            'emergency_title' => 'Chest pain or breathlessness?',
            'emergency_desc' => 'Call our emergency line now — priority dispatch 24 hours a day.',
            'footer_desc' => '24/7 ECG home service in Mohammadpur, Dhaka — hospital-grade home ECG tests, Holter monitoring and cardiologist-reviewed reports at your doorstep.',
            'copyright' => 'CardioHome. All rights reserved.',
            'facebook_url' => '#',
            'youtube_url' => '#',
            'geo_region' => 'BD-13',
            'geo_placename' => 'Mohammadpur, Dhaka',
            'geo_position' => '23.7662;90.3589',
            'bn_title' => 'বাসায় ইসিজি সেবা — মোহাম্মদপুর, ঢাকা',
            'bn_desc' => 'এখন আর হাসপাতালে লাইনে দাঁড়িয়ে ইসিজি করাতে হবে না। আমাদের ইসিজি হোম সার্ভিস মোহাম্মদপুর, শ্যামলী, লালমাটিয়া, ধানমন্ডি, আদাবর ও মিরপুরে ২৪ ঘণ্টা পাওয়া যায়। প্রশিক্ষিত টেকনিশিয়ান ৩০–৪৫ মিনিটের মধ্যে আপনার বাসায় এসে ১২-লিড ইসিজি করবেন, আর কার্ডিওলজিস্টের রিপোর্ট হোয়াটসঅ্যাপে পাঠানো হবে।',
            'bn_features' => json_encode([
                'বাসায় ইসিজি টেস্ট — মাত্র ৮০০ টাকা থেকে',
                'মহিলা টেকনিশিয়ান পাওয়া যায়',
                'সেবা শেষে পেমেন্ট — ক্যাশ, বিকাশ, নগদ',
            ]),
            'seo_title' => 'ECG Home Service in Dhaka — why test at home?',
            'seo_desc' => "An ECG (electrocardiogram) is a quick, painless test that records your heart's electrical activity. It helps doctors detect irregular heartbeat, heart attack signs, and other heart conditions. With our ECG home service, you no longer need to travel to a hospital or wait in long queues — we bring the same 12-lead ECG machine to your home.",
            'seo_who_title' => 'Who should book a home ECG test?',
            'seo_who_list' => json_encode([
                "Elderly or bedridden patients who can't travel easily",
                'Heart patients who need a routine ECG for their doctor',
                'Anyone with chest pain, palpitations or breathlessness',
                'People with diabetes or high blood pressure',
                'Pre-surgery, pre-employment or visa medical ECG',
            ]),
            'seo_included_title' => "What's included in our ECG at home?",
            'seo_included_desc' => 'Every ECG home service visit includes a trained technician, sterile disposable electrodes, a printed ECG strip on the spot, and a digital report on WhatsApp. Choose the cardiologist review package for a written interpretation within 30 minutes. Our home ECG service runs 24/7 across Mohammadpur and nearby areas of Dhaka.',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // 3. Hero Sliders
        Slider::truncate();
        Slider::create([
            'title' => 'in Dhaka City',
            'title_highlight' => 'ECG Home Service',
            'subtitle' => null,
            'badge_text' => null,
            'badge_icon' => null,
            'image' => 'images/slider-1.jpg',
            'btn1_text' => 'Book Home ECG',
            'btn1_link' => '#booking',
            'btn1_icon' => 'bi-calendar2-heart',
            'btn2_text' => '01348-223547',
            'btn2_link' => 'tel:+8801348223547',
            'btn2_icon' => 'bi-telephone-outbound',
            'float_card_1_title' => 'Live Heart Rate',
            'float_card_1_subtitle' => '72 BPM',
            'float_card_1_icon' => 'bi-heart-fill',
            'float_card_2_title' => 'Report Ready',
            'float_card_2_subtitle' => 'Cardiologist reviewed in 30m',
            'float_card_2_icon' => 'bi-file-earmark-medical',
            'order' => 1,
            'is_active' => true,
        ]);

        Slider::create([
            'title' => 'Modern Digital',
            'title_highlight' => 'Portable ECG',
            'subtitle' => 'at Your Doorstep',
            'badge_text' => '12-Lead Portable Device',
            'badge_icon' => 'bi-heart-pulse-fill',
            'image' => 'images/slider-2.jpg',
            'btn1_text' => 'Call 01348-223547',
            'btn1_link' => 'tel:+8801348223547',
            'btn1_icon' => 'bi-telephone-fill',
            'btn2_text' => 'View Pricing (৳800)',
            'btn2_link' => '#pricing',
            'btn2_icon' => 'bi-tag-fill',
            'float_card_1_title' => 'Hospital Grade ECG',
            'float_card_1_subtitle' => '12-Lead Portable Machine',
            'float_card_1_icon' => 'bi-activity',
            'float_card_2_title' => 'Instant Thermal Print',
            'float_card_2_subtitle' => 'Printed graph strip on-site',
            'float_card_2_icon' => 'bi-printer-fill',
            'order' => 2,
            'is_active' => true,
        ]);

        Slider::create([
            'title' => 'Expert',
            'title_highlight' => 'Cardiologist Review',
            'subtitle' => '& Fast Report',
            'badge_text' => 'BMDC Certified Cardiologists',
            'badge_icon' => 'bi-patch-check-fill',
            'image' => 'images/slider-3.jpg',
            'btn1_text' => 'WhatsApp 01348-223547',
            'btn1_link' => 'https://wa.me/8801348223547',
            'btn1_icon' => 'bi-whatsapp',
            'btn2_text' => 'Book Online',
            'btn2_link' => '#booking',
            'btn2_icon' => 'bi-calendar2-check',
            'float_card_1_title' => 'Cardiologist Network',
            'float_card_1_subtitle' => 'BMDC Registered Doctors',
            'float_card_1_icon' => 'bi-person-badge-fill',
            'float_card_2_title' => 'Report on WhatsApp',
            'float_card_2_subtitle' => 'Delivery in 30 minutes',
            'float_card_2_icon' => 'bi-whatsapp',
            'order' => 3,
            'is_active' => true,
        ]);

        // 4. Services
        Service::truncate();
        $services = [
            [
                'title' => '12-Lead ECG at Home',
                'tag_text' => 'Standard',
                'tag_class' => 'tag-standard',
                'tag_icon' => 'bi-shield-check',
                'icon' => 'bi-heart-pulse',
                'icon_class' => '',
                'image' => 'images/ecg-machine.jpg',
                'description' => 'Standard resting ECG to check heart rhythm, rate and electrical activity in comfort at home.',
                'booking_service_name' => '12-Lead ECG',
                'action_link' => '#booking',
                'action_text' => 'Book now',
                'order' => 1,
            ],
            [
                'title' => 'ECG + Cardiologist Review',
                'tag_text' => 'Most Popular',
                'tag_class' => 'tag-featured',
                'tag_icon' => 'bi-star-fill',
                'icon' => 'bi-clipboard2-pulse',
                'icon_class' => 'icon-indigo',
                'image' => 'images/sample-report.jpg',
                'description' => 'ECG with a written interpretation, diagnosis advice, and official digital report from a registered cardiologist.',
                'booking_service_name' => 'ECG + Cardiologist Review',
                'action_link' => '#booking',
                'action_text' => 'Book now',
                'order' => 2,
            ],
            [
                'title' => '24h Holter Monitoring',
                'tag_text' => '24h Wearable',
                'tag_class' => 'tag-wearable',
                'tag_icon' => 'bi-clock-history',
                'icon' => 'bi-smartwatch',
                'icon_class' => 'icon-amber',
                'image' => 'images/service-holter.jpg',
                'description' => 'Compact wearable monitor records your heart rhythm continuously for 24–48 hours during daily activities.',
                'booking_service_name' => 'Holter Monitoring',
                'action_link' => '#booking',
                'action_text' => 'Book now',
                'order' => 3,
            ],
            [
                'title' => 'Emergency ECG',
                'tag_text' => '24/7 Priority',
                'tag_class' => 'tag-urgent',
                'tag_icon' => 'bi-broadcast',
                'icon' => 'bi-lightning-charge',
                'icon_class' => 'icon-rose',
                'image' => 'images/service-emergency.jpg',
                'description' => 'Chest pain or palpitations? Priority dispatch with portable emergency ECG machine, day or night across Dhaka.',
                'booking_service_name' => 'Emergency ECG',
                'action_link' => '#booking',
                'action_text' => 'Book now',
                'order' => 4,
            ],
            [
                'title' => 'Elderly Care Package',
                'tag_text' => 'Gentle Care',
                'tag_class' => 'tag-care',
                'tag_icon' => 'bi-heart-fill',
                'icon' => 'bi-person-hearts',
                'icon_class' => 'icon-emerald',
                'image' => 'images/slider-1.jpg',
                'description' => 'Gentle 12-lead ECG with BP, blood glucose & SpO₂ pulse check for senior family members at home.',
                'booking_service_name' => 'Elderly Care Package',
                'action_link' => '#booking',
                'action_text' => 'Book now',
                'order' => 5,
            ],
            [
                'title' => 'Corporate & Group',
                'tag_text' => 'Camp & Group',
                'tag_class' => 'tag-group',
                'tag_icon' => 'bi-people-fill',
                'icon' => 'bi-buildings',
                'icon_class' => 'icon-sky',
                'image' => 'images/service-corporate.jpg',
                'description' => 'On-site ECG screening camps and cardiovascular checkups for offices, institutions and residential societies.',
                'booking_service_name' => 'Corporate & Group',
                'action_link' => '#contact',
                'action_text' => 'Contact us',
                'order' => 6,
            ],
        ];

        foreach ($services as $srv) {
            Service::create($srv);
        }

        // 5. Gallery
        Gallery::truncate();
        Gallery::create([
            'title' => 'মো: শরিফ',
            'designation' => 'মার্কেটিং ম্যানেজার',
            'badge_text' => 'অফিসিয়াল কার্ড',
            'badge_class' => 'badge-contact',
            'badge_icon' => 'bi-person-vcard-fill',
            'image' => 'images/1.jpg',
            'description' => 'ওটিতে পোর্টেবল সি-আর্ম (FPD) এবং ডিজিটাল পোর্টেবল এক্স-রে সার্ভিসের যে কোনো প্রয়োজনে বা জরুরি সিরিয়ালের জন্য সরাসরি যোগাযোগ করুন।',
            'tags' => [
                ['text' => 'অথেনটিক সার্ভিস', 'icon' => 'bi-shield-check', 'class' => 'tech-tag'],
                ['text' => 'সরাসরি হটলাইন', 'icon' => 'bi-telephone-inbound-fill', 'class' => 'tech-tag tag-urgent'],
            ],
            'features' => null,
            'btn1_text' => 'কল করুন: 01348-223547',
            'btn1_link' => 'tel:+8801348223547',
            'btn1_icon' => 'bi-telephone-fill',
            'btn1_class' => 'btn-glow',
            'btn2_text' => 'WhatsApp-এ চ্যাট করুন',
            'btn2_link' => 'https://wa.me/8801348223547',
            'btn2_icon' => 'bi-whatsapp',
            'btn2_class' => 'btn-outline-success',
            'order' => 1,
        ]);

        Gallery::create([
            'title' => 'ডিজিটাল পোর্টেবল এক্স-রে',
            'designation' => null,
            'badge_text' => 'ডিজিটাল প্রসেসিং',
            'badge_class' => 'badge-tech',
            'badge_icon' => 'bi-laptop',
            'image' => 'images/2.jpg',
            'description' => 'উন্নত ডিজিটাল ফ্ল্যাট প্যানেল ডিটেক্টর (FPD) দ্বারা অন-স্পট এক্স-রে ও কম্পিউটার মনিটরে হাই-রেজোলিউশন ইমেজ প্রদান করা হয়।',
            'tags' => [
                ['text' => 'Flat Panel Detector', 'icon' => 'bi-cpu-fill', 'class' => 'tech-tag'],
                ['text' => 'রিয়েল-টাইম', 'icon' => 'bi-lightning-charge-fill', 'class' => 'tech-tag'],
            ],
            'features' => [
                'তাৎক্ষণিক ডিজিটাল ইমেজ ট্রান্সফার',
                'নিরাপদ ও আন্তর্জাতিক মানের রেডিয়েশন কন্ট্রোল',
                'হাড়ের নিখুঁত ও পরিষ্কার ফ্র্যাকচার ভিউ',
            ],
            'btn1_text' => 'এক্স-রে টেস্ট বুক করুন',
            'btn1_link' => '#booking',
            'btn1_icon' => 'bi-calendar2-plus',
            'btn1_class' => 'btn-outline-primary',
            'booking_service' => 'Digital Portable X-Ray',
            'order' => 2,
        ]);

        Gallery::create([
            'title' => 'ওটিতে পোর্টেবল সি-আর্ম (FPD)',
            'designation' => null,
            'badge_text' => 'ওটি লাইভ সাপোর্ট',
            'badge_class' => 'badge-ot',
            'badge_icon' => 'bi-hospital',
            'image' => 'images/3.jpg',
            'description' => 'অর্থোপেডিক ট্রমা, স্পাইন ও জটিল সার্জারিতে সার্জনের জন্য রিয়েল-টাইম সি-আর্ম ফ্লুরোস্কোপি ও অভিজ্ঞ টেকনিশিয়ান সাপোর্ট।',
            'tags' => [
                ['text' => 'OT Support', 'icon' => 'bi-hospital-fill', 'class' => 'tech-tag'],
                ['text' => '২৪/৭ অন-কল', 'icon' => 'bi-clock-fill', 'class' => 'tech-tag tag-urgent'],
            ],
            'features' => [
                'দক্ষ ও অভিজ্ঞ সি-আর্ম টেকনিশিয়ান ব্যাকআপ',
                'অপারেশন টেবিলে লাইভ ফিক্সেশন ভিজ্যুয়ালাইজেশন',
                'ঢাকা শহরের যে কোনো হাসপাতালে জরুরি ডেলিভারি',
            ],
            'btn1_text' => 'ওটি সাপোর্টের জন্য কল করুন',
            'btn1_link' => 'tel:+8801348223547',
            'btn1_icon' => 'bi-telephone-fill',
            'btn1_class' => 'btn-glow',
            'order' => 3,
        ]);

        Gallery::create([
            'title' => '১২-লিড পোর্টেবল ইসিজি মেশিন',
            'designation' => null,
            'badge_text' => 'ডিজিটাল ইসিজি',
            'badge_class' => 'badge-contact',
            'badge_icon' => 'bi-heart-pulse-fill',
            'image' => 'images/ecg-machine.jpg',
            'description' => 'ক্যালিব্রেটেড ও হাসপাতাল-গ্রেড প্রিমিয়াম মেশিন। রোগীর বেডসাইডেই অন-স্ক্রিন কালার গ্রাফ এবং তাৎক্ষণিক থার্মাল প্রিন্ট আউটপুট।',
            'tags' => [
                ['text' => '12-Lead Portable', 'icon' => 'bi-check-all', 'class' => 'tech-tag'],
                ['text' => 'অন-স্পট প্রিন্ট', 'icon' => 'bi-printer', 'class' => 'tech-tag'],
            ],
            'features' => [
                'নির্ভুল ১২-লিড সাইনাস রিদম ট্র্যাকিং',
                'হাসপাতালে না গিয়েই বেডসাইডে টেস্ট',
                'তাৎক্ষণিক অরিজিনাল গ্রাফ পেপার স্ট্রিপ',
            ],
            'btn1_text' => 'ইসিজি টেস্ট বুক করুন',
            'btn1_link' => '#booking',
            'btn1_icon' => 'bi-calendar2-check',
            'btn1_class' => 'btn-outline-primary',
            'booking_service' => '12-Lead ECG',
            'order' => 4,
        ]);

        Gallery::create([
            'title' => 'মোবাইল সি-আর্ম ফ্লুরোস্কোপি',
            'designation' => null,
            'badge_text' => 'হাই-টেক সি-আর্ম',
            'badge_class' => 'badge-tech',
            'badge_icon' => 'bi-display',
            'image' => 'images/c-arm.jpg',
            'description' => 'উচ্চক্ষমতাসম্পন্ন মোবাইল সি-আর্ম ইউনিট ও ডুয়েল ডায়াগনস্টিক মনিটর। অর্থোপেডিক ও স্পাইন সার্জারিতে রিয়েল-টাইম নিখুঁত ইমেজিং।',
            'tags' => [
                ['text' => 'Dual HD Display', 'icon' => 'bi-tv', 'class' => 'tech-tag'],
                ['text' => 'Low Dose Mode', 'icon' => 'bi-shield-plus', 'class' => 'tech-tag'],
            ],
            'features' => [
                'ডুয়েল স্ক্রিন লাইভ ফ্লুরোস্কোপি ভিউ',
                'ফ্ল্যাট প্যানেল ডিটেক্টর (FPD) রেজোলিউশন',
                'অন-কল সাপোর্ট ও যেকোনো ক্লিনিকে স্থানান্তরযোগ্য',
            ],
            'btn1_text' => 'সি-আর্ম বুকিং কল: 01348-223547',
            'btn1_link' => 'tel:+8801348223547',
            'btn1_icon' => 'bi-telephone-fill',
            'btn1_class' => 'btn-glow',
            'order' => 5,
        ]);

        Gallery::create([
            'title' => 'ভেরিফায়েড রিপোর্ট ও ডেলিভারি',
            'designation' => null,
            'badge_text' => 'স্যাম্পল রিপোর্ট',
            'badge_class' => 'badge-ot',
            'badge_icon' => 'bi-file-earmark-medical',
            'image' => 'images/sample-report.jpg',
            'description' => 'টেস্ট শেষে প্রিন্ট কপির পাশাপাশি রেজিস্টার্ড কার্ডিওলজিস্টের বিস্তারিত ইন্টারপ্রিটেশন ও সই সম্বলিত ডিজিটাল পিডিএফ রিপোর্ট হোয়াটসঅ্যাপে।',
            'tags' => [
                ['text' => 'BMDC Registered', 'icon' => 'bi-patch-check-fill', 'class' => 'tech-tag'],
                ['text' => '30 Min Delivery', 'icon' => 'bi-whatsapp', 'class' => 'tech-tag tag-urgent'],
            ],
            'features' => [
                'হার্ট রেট, বিপি, রিদম বিস্তারিত বিশ্লেষণ',
                'অভিজ্ঞ কার্ডিওলজিস্টের অফিসিয়াল স্বাক্ষর',
                'তাৎক্ষণিক হোয়াটসঅ্যাপ ও ইমেইল ডেলিভারি',
            ],
            'btn1_text' => 'হোয়াটসঅ্যাপে রিপোর্ট স্যাম্পল দেখুন',
            'btn1_link' => 'https://wa.me/8801348223547',
            'btn1_icon' => 'bi-whatsapp',
            'btn1_class' => 'btn-outline-success',
            'order' => 6,
        ]);

        // 6. About Section
        AboutSection::truncate();
        AboutSection::create([
            'eyebrow' => 'Why CardioHome',
            'title' => 'The most trusted',
            'title_highlight' => 'ECG Home Service in Mohammadpur',
            'lead_text' => 'We bring the accuracy of a hospital to your living room — with the care and patience your loved ones deserve.',
            'image' => 'images/doctor.jpg',
            'experience_years' => '10+',
            'experience_text' => "Years of cardiac\ncare experience",
            'features' => [
                'Female technicians available on request',
                'BMDC-registered cardiologists review every report',
                'Calibrated, hospital-grade portable machines',
                'Pay after service — Cash, bKash or Nagad',
            ],
            'stat1_count' => 25,
            'stat1_suffix' => '+',
            'stat1_label' => 'Technicians',
            'stat2_count' => 12,
            'stat2_suffix' => null,
            'stat2_label' => 'Cardiologists',
            'stat3_count' => 24,
            'stat3_suffix' => '/7',
            'stat3_label' => 'Support',
        ]);

        // 7. Pricing Plans
        PricingPlan::truncate();
        PricingPlan::create([
            'name' => 'Basic ECG',
            'subtitle' => 'Resting 12-lead ECG',
            'price' => 800,
            'currency' => '৳',
            'is_featured' => false,
            'ribbon_text' => null,
            'features' => [
                ['text' => 'Home visit included', 'included' => true],
                ['text' => 'Printed ECG strip', 'included' => true],
                ['text' => 'Digital copy on WhatsApp', 'included' => true],
                ['text' => 'Cardiologist review', 'included' => false],
            ],
            'btn_text' => 'Choose Basic',
            'btn_service_name' => '12-Lead ECG',
            'order' => 1,
            'is_active' => true,
        ]);

        PricingPlan::create([
            'name' => 'ECG + Review',
            'subtitle' => 'ECG with cardiologist report',
            'price' => 1500,
            'currency' => '৳',
            'is_featured' => true,
            'ribbon_text' => 'Most Popular',
            'features' => [
                ['text' => 'Everything in Basic', 'included' => true],
                ['text' => 'Cardiologist interpretation', 'included' => true],
                ['text' => 'Report within 30 minutes', 'included' => true],
                ['text' => 'Free follow-up call', 'included' => true],
            ],
            'btn_text' => 'Choose Review',
            'btn_service_name' => 'ECG + Cardiologist Review',
            'order' => 2,
            'is_active' => true,
        ]);

        PricingPlan::create([
            'name' => 'Holter 24h',
            'subtitle' => 'Continuous rhythm monitoring',
            'price' => 4500,
            'currency' => '৳',
            'is_featured' => false,
            'ribbon_text' => null,
            'features' => [
                ['text' => 'Device fitting at home', 'included' => true],
                ['text' => 'Pickup after 24 hours', 'included' => true],
                ['text' => 'Detailed analysis report', 'included' => true],
                ['text' => 'Cardiologist consultation', 'included' => true],
            ],
            'btn_text' => 'Choose Holter',
            'btn_service_name' => 'Holter Monitoring',
            'order' => 3,
            'is_active' => true,
        ]);

        // 8. Coverage Areas
        CoverageArea::truncate();
        $areas = [
            ['name' => 'Mohammadpur', 'is_primary' => true],
            ['name' => 'Tajmahal Road', 'is_primary' => false],
            ['name' => 'Ring Road', 'is_primary' => false],
            ['name' => 'Shyamoli', 'is_primary' => false],
            ['name' => 'Lalmatia', 'is_primary' => false],
            ['name' => 'Dhanmondi', 'is_primary' => false],
            ['name' => 'Adabor', 'is_primary' => false],
            ['name' => 'Shekhertek', 'is_primary' => false],
            ['name' => 'Bosila', 'is_primary' => false],
            ['name' => 'Agargaon', 'is_primary' => false],
            ['name' => 'Kallyanpur', 'is_primary' => false],
            ['name' => 'Mirpur', 'is_primary' => false],
        ];

        foreach ($areas as $index => $ar) {
            CoverageArea::create([
                'name' => $ar['name'],
                'is_primary' => $ar['is_primary'],
                'icon' => 'bi-geo-alt',
                'order' => $index + 1,
                'is_active' => true,
            ]);
        }

        // 9. Testimonials
        Testimonial::truncate();
        Testimonial::create([
            'name' => 'Rafiq Hasan',
            'location' => 'Tajmahal Road, Mohammadpur',
            'rating' => 5.0,
            'comment' => '"My father is 78 and can\'t travel easily. The technician came in 30 minutes and was so patient. Report came on WhatsApp right away."',
            'avatar_text' => 'RH',
            'avatar_class' => 'avatar-teal',
            'is_verified' => true,
            'order' => 1,
        ]);

        Testimonial::create([
            'name' => 'Nusrat Sultana',
            'location' => 'Lalmatia, Dhaka',
            'rating' => 5.0,
            'comment' => '"I requested a female technician for my mother and they arranged it without any hassle. Very professional service."',
            'avatar_text' => 'NS',
            'avatar_class' => 'avatar-rose',
            'is_verified' => true,
            'order' => 2,
        ]);

        Testimonial::create([
            'name' => 'Arif Khan',
            'location' => 'Shyamoli, Dhaka',
            'rating' => 4.5,
            'comment' => '"Called at midnight for chest discomfort. They came fast and the cardiologist called me back with advice. Life saver!"',
            'avatar_text' => 'AK',
            'avatar_class' => 'avatar-amber',
            'is_verified' => true,
            'order' => 3,
        ]);

        // 10. FAQs
        Faq::truncate();
        $faqs = [
            [
                'question' => 'Is a home ECG as accurate as a hospital ECG?',
                'answer' => 'Yes. We use the same calibrated 12-lead ECG machines used in hospitals, so the results are equally accurate and accepted by doctors.',
            ],
            [
                'question' => 'How long does the test take?',
                'answer' => 'The ECG itself takes about 5–10 minutes. Including setup, the full visit is usually around 20 minutes.',
            ],
            [
                'question' => 'How do I get my report?',
                'answer' => 'You get a printed ECG strip on the spot, and a digital PDF on WhatsApp/email. Cardiologist-reviewed reports arrive within 30 minutes.',
            ],
            [
                'question' => 'What payment methods do you accept?',
                'answer' => 'Cash, bKash, Nagad and Rocket. You only pay after the test is completed.',
            ],
            [
                'question' => 'Is it safe? Does it hurt?',
                'answer' => 'Completely safe and painless. ECG only records electrical signals — no current passes into the body. We use single-use disposable electrodes.',
            ],
            [
                'question' => 'How much does an ECG home service cost in Dhaka?',
                'answer' => 'Our ECG home service starts at ৳800, including the home visit fee. An ECG with cardiologist review costs ৳1,500, and 24-hour Holter monitoring at home costs ৳4,500.',
            ],
            [
                'question' => 'Is your ECG home service available at night?',
                'answer' => 'Yes. Our ECG home service in Mohammadpur runs 24 hours a day, 7 days a week, including holidays. Emergency requests get priority dispatch.',
            ],
            [
                'question' => 'Which areas does your home ECG service cover?',
                'answer' => 'We cover Mohammadpur, Tajmahal Road, Ring Road, Shyamoli, Lalmatia, Dhanmondi, Adabor, Shekhertek, Bosila, Agargaon, Kallyanpur and Mirpur. Call us to check other areas of Dhaka.',
            ],
        ];

        foreach ($faqs as $i => $faq) {
            Faq::create([
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'order' => $i + 1,
                'is_active' => true,
            ]);
        }
    }
}
