<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();

            $table->string('is_lawyer')->nullable();
            $table->string('is_consultant')->nullable();
            $table->string('is_trainer')->nullable();
            $table->string('is_writer')->nullable();

            $table->string('id_number')->nullable(); //extra
            $table->enum('marital_status',['Married','Unmarried'])->nullable(); //extra
            $table->string('father_name')->nullable();
            $table->string('husband_name')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender',['Male','Female','Others'])->nullable();
            $table->enum('nationality',['Bangladeshi','Others'])->nullable();
            $table->string('country_name')->nullable();

            $table->string('nid_passport_number')->nullable();
            $table->string('nid_passport_front')->nullable();
            $table->string('nid_passport_back')->nullable();

            $table->bigInteger('division_id')->unsigned()->nullable();
            $table->bigInteger('district_id')->unsigned()->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_contact_relation')->nullable();
            $table->text('key_profile')->nullable();
            $table->json('specializations')->nullable();

            //Educational Info
            $table->integer('latest_edu_year')->nullable();
            $table->string('latest_edu_institute')->nullable();
            $table->string('latest_edu_group_subject')->nullable();

            $table->integer('ssc_year')->nullable();
            $table->string('ssc_institute')->nullable();
            $table->string('ssc_group')->nullable();

            $table->integer('hsc_year')->nullable();
            $table->string('hsc_institute')->nullable();
            $table->string('hsc_group')->nullable();

            $table->integer('graduate_year')->nullable();
            $table->string('graduate_institute')->nullable();
            $table->string('graduate_group_subject')->nullable();

            $table->integer('post_graduate_year')->nullable();
            $table->string('post_graduate_institute')->nullable();
            $table->string('post_graduate_subject')->nullable();

            $table->integer('other_degree_year')->nullable();
            $table->string('other_degree_institute')->nullable();
            $table->string('other_degree_group_subject')->nullable();

            //Professional Info
            $table->enum('profession_type',['Lawyer','Others'])->nullable();

            //For Others
            $table->bigInteger('profession_id')->unsigned()->nullable();
            $table->string('company_organization')->nullable();
            $table->string('designation')->nullable();
            $table->date('job_from')->nullable();
            $table->date('job_to')->nullable();
            $table->string('profession_doc')->nullable();

            //For Lawyer//

            // bar council enrollment
            $table->date('bce_date')->nullable()->comment('bce=bar council enrollment');
            $table->string('bce_sanad_no')->nullable()->comment('bce=bar council enrollment');
            $table->string('bce_doc')->nullable()->comment('bce=bar council enrollment');
            // mother bar association
            $table->bigInteger('mba_division')->unsigned()->nullable()->comment('mba=mother bar association');
            $table->bigInteger('mba_district')->unsigned()->nullable()->comment('mba=mother bar association');
            $table->string('mba_membership_no')->nullable()->comment('mba=mother bar association');
            $table->string('mba_doc')->nullable()->comment('mba=mother bar association');
            // second bar association
            $table->bigInteger('sba_division')->unsigned()->nullable()->comment('sba=second bar association');
            $table->bigInteger('sba_district')->unsigned()->nullable()->comment('sba=second bar association');
            $table->string('sba_membership_no')->nullable()->comment('sba=second bar association');
            $table->string('sba_doc')->nullable()->comment('sba=second bar association');
            // high court enrollment
            $table->date('hce_date')->nullable()->comment('hce=high court enrollment');
            $table->string('hce_sanad_no')->nullable()->comment('hce=high court enrollment');
            $table->string('hce_doc')->nullable()->comment('hce=high court enrollment');
            // supreme court bar association
            $table->date('scba_date')->nullable()->comment('scba=supreme court bar association');
            $table->string('scba_membership_no')->nullable()->comment('scba=supreme court bar association');
            $table->string('scba_doc')->nullable()->comment('scba=supreme court bar association');
            // bar council fee
            $table->date('bcf_payment_date')->nullable()->comment('bcf=bar council fee');
            $table->string('bcf_receipt_no')->nullable()->comment('bcf=bar council fee');
            $table->string('bcf_doc')->nullable()->comment('bcf=bar council fee');
            // practicing bar membership fee
            $table->date('pbmf_payment_date')->nullable()->comment('pbmf=practicing bar membership fee');
            $table->string('pbmf_receipt_no')->nullable()->comment('pbmf=practicing bar membership fee');
            $table->string('pbmf_doc')->nullable()->comment('pbmf=practicing bar membership fee');
            // scba_mf=SCBA membership fee
            $table->date('scba_mf_payment_date')->nullable()->comment('scba_mf=SCBA membership fee');
            $table->string('scba_mf_receipt_no')->nullable()->comment('scba_mf=SCBA membership fee');
            $table->string('scba_mf_doc')->nullable()->comment('scba_mf=SCBA membership fee');
            //Chamber details
            $table->string('chamber_name')->nullable();
            $table->string('chamber_role')->nullable();
            $table->string('chamber_address')->nullable();


            //Contact info
            $table->string('contact_number')->nullable();
            $table->string('contact_email')->nullable();


            $table->boolean('is_approved')->default(0);
            $table->boolean('status')->default(1)->nullable();
            $table->string('guard_name')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->bigInteger('deleted_by')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experts');
    }
};
