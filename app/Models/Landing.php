<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    use HasFactory;
    protected $table = "landing";

    protected $fillable = [
        'id',
        'status',
        'home',
        'home_link',
        'about',
        'about_link',
        'service',
        'service_link',
        'quote',
        'quote_link',
        'blog',
        'blog_link',
        'faq',
        'faq_link',
        'login',
        'register',
        'about_section',
        'explore_section',
        'cta_section',
        'footer',
        'service_footer',
        'service_1',
        'service_1_link',
        'service_2',
        'service_2_link',
        'service_3',
        'service_3_link',
        'service_4',
        'service_4_link',
        'service_5',
        'service_5_link',
        'company_footer',
        'company_1',
        'company_1_link',
        'company_2',
        'company_2_link',
        'company_3',
        'company_3_link',
        'company_4',
        'company_4_link',
        'company_5',
        'company_5_link',
        'common_footer',
        'common_1',
        'common_1_link',
        'common_2',
        'common_2_link',
        'common_3',
        'common_3_link',
        'legal_footer',
        'legal_1',
        'legal_1_link',
        'legal_2',
        'legal_2_link',
        'legal_3',
        'legal_3_link',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'youtube',
        'pinterest',
        'google',
        'dribbble',
        'soundcloud',
        'spotify',
        'skype',
        'whatsapp',
        'telegram',
        'email',
    ]; 

    /**
     * Get the user that owns the blog post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
