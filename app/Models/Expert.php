<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Expert extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'expert';
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',


        'mobile',
        'image',
        'is_lawyer',
        'is_consultant',
        'is_trainer',
        'is_writer',

        'id_number',
        'marital_status',
        'father_name',
        'husband_name',
        'dob',
        'gender',
        'nationality',
        'country_name',

        'nid_passport_number',
        'nid_passport_front',
        'nid_passport_back',

        'division_id',
        'district_id',
        'present_address',
        'permanent_address',
        'emergency_contact',
        'emergency_contact_relation',
        'key_profile',
        'specializations',

        //Educational Info
        'latest_edu_year',
        'latest_edu_institute',
        'latest_edu_group_subject',

        'ssc_year',
        'ssc_institute',
        'ssc_group',

        'hsc_year',
        'hsc_institute',
        'hsc_group',

        'graduate_year',
        'graduate_institute',
        'graduate_group_subject',

        'post_graduate_year',
        'post_graduate_institute',
        'post_graduate_subject',

        'other_degree_year',
        'other_degree_institute',
        'other_degree_group_subject',

        //Professional Info
        'profession_type',

        //For Others
        'profession_id',
        'company_organization',
        'designation',
        'job_from',
        'job_to',
        'profession_doc',

        //For Lawyer//

        // bar council enrollment
        'bce_date',
        'bce_sanad_no',
        'bce_doc',
        // mother bar association
        'mba_division',
        'mba_district',
        'mba_membership_no',
        'mba_doc',
        // second bar association
        'sba_division',
        'sba_district',
        'sba_membership_no',
        'sba_doc',
        // high court enrollment
        'hce_date',
        'hce_sanad_no',
        'hce_doc',
        // supreme court bar association
        'scba_date',
        'scba_membership_no',
        'scba_doc',
        // bar council fee
        'bcf_payment_date',
        'bcf_receipt_no',
        'bcf_doc',
        // practicing bar membership fee
        'pbmf_payment_date',
        'pbmf_receipt_no',
        'pbmf_doc',
        // scba_mf=SCBA membership fee
        'scba_mf_payment_date',
        'scba_mf_receipt_no',
        'scba_mf_doc',
        //Chamber details
        'chamber_name',
        'chamber_role',
        'chamber_address',


        //Contact info
        'contact_number',
        'contact_email',


        'is_approved',
        // 'status',
        'guard_name',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id')->withDefault([
            'name' => 'None',
        ]);
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id')->withDefault([
            'name' => 'None',
        ]);
    }
}
