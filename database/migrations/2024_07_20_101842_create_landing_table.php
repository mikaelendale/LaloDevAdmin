<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('landing', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable()->default('on');
            $table->string('home')->nullable()->default('on');
            $table->string('home_link')->nullable()->default('/');
            $table->string('about')->nullable()->default('on');
            $table->string('about_link')->nullable()->default('/about');
            $table->string('service')->nullable()->default('on');
            $table->string('service_link')->nullable()->default('/service');
            $table->string('quote')->nullable()->default('on');
            $table->string('quote_link')->nullable()->default('/contact');
            $table->string('blog')->nullable()->default('on');
            $table->string('blog_link')->nullable()->default('https://blog.lalodev.com');
            $table->string('faq')->nullable()->default('on');
            $table->string('faq_link')->nullable()->default('/faq');
            $table->string('login')->nullable()->default('on');
            $table->string('register')->nullable()->default('on');
            //sections
            $table->string('about_section')->nullable()->default('on');
            $table->string('explore_section')->nullable()->default('on');
            $table->string('cta_section')->nullable()->default('on');
            $table->string('footer')->nullable()->default('on');
            //footer details
            //service fotter row
            $table->string('service_footer')->nullable()->default('on');
            $table->string('service_1')->nullable()->default('Website Development');
            $table->string('service_1_link')->nullable()->default('https://info.lalodev.com/website_development');
            $table->string('service_2')->nullable()->default('E-commerce Solutions');
            $table->string('service_2_link')->nullable()->default('https://info.lalodev.com/ecommerce');
            $table->string('service_3')->nullable()->default('UX/UI Design');
            $table->string('service_3_link')->nullable()->default('https://info.lalodev.com/UI');
            $table->string('service_4')->nullable()->default('Content Management Systems');
            $table->string('service_4_link')->nullable()->default('https://info.lalodev.com/CMS');
            $table->string('service_5')->nullable()->default('Website Maintenance');    
            $table->string('service_5_link')->nullable()->default('https://info.lalodev.com/maintainance');
            //company row
            $table->string('company_footer')->nullable()->default('on');
            $table->string('company_1')->nullable()->default('About us');
            $table->string('company_1_link')->nullable()->default('/index');
            $table->string('company_2')->nullable()->default('Community');
            $table->string('company_2_link')->nullable()->default('https://t.me/lalo_dev_community');
            $table->string('company_3')->nullable()->default('Blog');
            $table->string('company_3_link')->nullable()->default('https://blog.lalodev.com');
            $table->string('company_4')->nullable()->default('Contact');
            $table->string('company_4_link')->nullable()->default('/contact');
            $table->string('company_5')->nullable()->default('Events');
            $table->string('company_5_link')->nullable()->default('/events');
            //comon row
            $table->string('common_footer')->nullable()->default('on');
            $table->string('common_1')->nullable()->default('Community');
            $table->string('common_1_link')->nullable()->default('https://community.lalodev.com/');
            $table->string('common_2')->nullable()->default('Terms of service');
            $table->string('common_2_link')->nullable()->default('https://lalodev.com/terms-conditions');
            $table->string('common_3')->nullable()->default('Report a vulnerability');
            $table->string('common_3_link')->nullable()->default('https://support.lalodev.com/');
            //legal row
            $table->string('legal_footer')->nullable()->default('on');
            $table->string('legal_1')->nullable()->default('Terms & Conditions');
            $table->string('legal_1_link')->nullable()->default('https://lalodev.com/terms-conditions');
            $table->string('legal_2')->nullable()->default('Privacy policy');
            $table->string('legal_2_link')->nullable()->default('http://localhost:8000/policies');
            $table->string('legal_3')->nullable()->default('More about lalodev');
            $table->string('legal_3_link')->nullable()->default('https://info.lalodev.com/');
            //social links
            $table->string('facebook')->nullable()->default('none');
            $table->string('twitter')->nullable()->default('none');
            $table->string('instagram')->nullable()->default('https://instagram.com/lalodevofficial');
            $table->string('linkedin')->nullable()->default('none');
            $table->string('youtube')->nullable()->default('none');
            $table->string('pinterest')->nullable()->default('none');
            $table->string('google')->nullable()->default('none');
            $table->string('dribbble')->nullable()->default('none');
            $table->string('soundcloud')->nullable()->default('none');
            $table->string('spotify')->nullable()->default('none');
            $table->string('skype')->nullable()->default('none');
            $table->string('whatsapp')->nullable()->default('https://wa.me/+251955133507');
            $table->string('telegram')->nullable()->default('https://t.me/lalo_dev');
            $table->string('email')->nullable()->default('developer@lalodev.com');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing');
    }
};
