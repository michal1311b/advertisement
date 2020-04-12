<template>
    <ValidationObserver v-slot="{ handleSubmit }">
        <div class="px-2 py-2 text-danger font-weight-bold">
            {{ trans('sentence.download-helper-info') }}
            <p>
                <img src="/images/word-icon.png" alt="Microsoft Word" class="logo" @click="exportHTML"/>
            </p>
        </div>   

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link step1 active" id="step1-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="step1" aria-selected="true">{{ trans('buttons.step1') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link step2" id="step2-tab" data-toggle="tab" href="#step2" role="tab" aria-controls="step2" aria-selected="false">{{ trans('buttons.step2') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link step3" id="step3-tab" data-toggle="tab" href="#step3" role="tab" aria-controls="step3" aria-selected="false">{{ trans('buttons.step3') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link step4" id="step4-tab" data-toggle="tab" href="#step4" role="tab" aria-controls="step4" aria-selected="false">{{ trans('buttons.step4') }}</a>
            </li>
        </ul>
        <form method="POST" @submit.prevent="handleSubmit(submitForm)" enctype="multipart/form-data">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="step1" role="tabpanel" aria-labelledby="step1">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><i class="fas fa-user-alt"></i>&nbsp;{{ trans('profile.username') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-md-6">
                                <ValidationProvider :name="trans('profile.username')" rules="required|min:3|max:190" v-slot="{ errors }">
                                    <input id="name" type="text" class="form-control" name="name" v-model="formInputs.name" autocomplete="name" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                <i class="fas fa-envelope-open-text"></i>&nbsp;E-Mail <span class="text-danger font-weight-bolder">*</span>
                            </label>

                            <div class="col-md-6">
                                <ValidationProvider name="email" rules="required|email" v-slot="{ errors }">
                                    <input id="email" type="email" class="form-control" name="email" v-model="formInputs.email" autocomplete="email">
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>
                        <ValidationObserver>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">
                                    <i class="fas fa-lock"></i>&nbsp;{{ trans('sentence.password') }} <span class="text-danger font-weight-bolder">*</span>
                                </label>

                                <div class="col-md-6">
                                    <ValidationProvider :name="trans('sentence.password')" rules="required|min:8|confirmed:password-confirm" v-slot="{ errors }">
                                        <input id="password" type="password" class="form-control" name="password" v-model="formInputs.password" autocomplete="new-password">
                                        <span class="text-danger">{{ errors[0] }}</span >
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                    <i class="fas fa-lock"></i>&nbsp;{{ trans('profile.confirm_password') }} <span class="text-danger font-weight-bolder">*</span>
                                </label>

                                <div class="col-md-6">
                                    <ValidationProvider :name="trans('profile.confirm_password')" v-slot="{ errors }" vid="password-confirm">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="formInputs.password_confirmation" autocomplete="new-password">
                                        <span class="text-danger">{{ errors[0] }}</span >
                                    </ValidationProvider>
                                </div>
                            </div>
                        </ValidationObserver>

                        <div class="form-group row">
                            <label for="company_nip" class="col-md-4 col-form-label text-md-right"><i class="fas fa-id-badge"></i>&nbsp;{{ trans('company.company_nip') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-md-6">
                                <ValidationProvider :name="trans('company.company_nip')" rules="required" v-slot="{ errors }">
                                    <input id="company_nip" type="number" class="form-control" name="company_nip" v-model="formInputs.company_nip" autocomplete="company_nip" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 offset-md-4 col-md-8" :disabled="!blockGus">
                                <span class="btn btn-rounded btn-info" @click="getCompanyData" v-if="(formInputs.company_nip !== '') && (formInputs.company_nip.length === 10)">{{ trans('buttons.btn-gus-data') }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_name" class="col-md-4 col-form-label text-md-right"><i class="fas fa-building"></i>&nbsp;{{ trans('company.company_name') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-md-6">
                                <ValidationProvider :name="trans('company.company_name')" rules="required|min:3|max:191" v-slot="{ errors }">
                                    <input id="company_name" type="text" class="form-control" name="company_name" v-model="formInputs.company_name" autocomplete="company_name" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_street" class="col-md-4 col-form-label text-md-right"><i class="fas fa-road"></i>&nbsp;{{ trans('company.company_street') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-md-6">
                                <ValidationProvider :name="trans('company.company_street')" rules="required|min:3|max:191" v-slot="{ errors }">
                                    <input id="company_street" type="text" class="form-control" name="company_street" v-model="formInputs.company_street" autocomplete="company_street" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_post_code" class="col-md-4 col-form-label text-md-right"><i class="fas fa-map-marked"></i>&nbsp;{{ trans('company.company_post_code') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-md-6">
                                <ValidationProvider :name="trans('company.company_post_code')" rules="required" v-slot="{ errors }">
                                    <input id="company_post_code" type="text" class="form-control" name="company_post_code" v-model="formInputs.company_post_code" autocomplete="company_post_code" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_city" class="col-md-4 col-form-label text-md-right"><i class="fas fa-city"></i>&nbsp;{{ trans('company.company_city') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-md-6">
                                <ValidationProvider :name="trans('company.company_city')" rules="required|min:3|max:191" v-slot="{ errors }">
                                    <input id="company_city" type="text" class="form-control" name="company_city" v-model="formInputs.company_city" autocomplete="company_city" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <a class="btn btn-rounded btn-primary go-step2 text-white">
                                    {{ trans('buttons.step2') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-heading"></i>&nbsp;{{ trans('sentence.title') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('sentence.title')" rules="required|min:3|max:190" v-slot="{ errors }">
                                    <input id="title" type="title" class="form-control" name="title" v-model="formInputs.title" autocomplete="title" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-audio-description"></i>&nbsp;{{ trans('offer.description') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <tinymce id="description" name="description" v-model="formInputs.description">
                                    {{ formInputs.description }}
                                </tinymce>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profits" class="col-12 col-md-3 col-form-label text-md-right"><i class="fab fa-product-hunt"></i>&nbsp;{{ trans('offer.profits') }}</label>

                            <div class="col-12 col-md-9">
                                <tinymce id="profits" name="profits" v-model="formInputs.profits">
                                    {{ formInputs.profits }}
                                </tinymce>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="requirements" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-align-justify"></i>&nbsp;{{ trans('offer.requirements') }}</label>

                            <div class="col-12 col-md-9">
                                <tinymce id="requirements" name="requirements" v-model="formInputs.requirements">
                                    {{ formInputs.requirements }}
                                </tinymce>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <a class="btn btn-rounded btn-primary go-step3 text-white">
                                    {{ trans('buttons.step3') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="work_id"><i class="fas fa-file-contract"></i>&nbsp;{{ trans('offer.settlement') }} <span class="text-danger font-weight-bolder">*</span></label>
                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('offer.settlement')" :rules="'oneOf:' + workIds" v-slot="{ errors }">
                                    <select data-live-search="true" class="form-control" name="work_id" v-model="formInputs.work_id" id="work_id">
                                        <option selected>{{ trans('sentence.choose') }}</option>
                                        <option v-for="work in works" :key="work.id" :value="work.id">{{ work.name }}</option>
                                    </select>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="postCode" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-map-marked"></i>&nbsp;{{ trans('offer.post_code') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('offer.post_code')" rules="required" v-slot="{ errors }">
                                    <input id="post_code" type="text" class="form-control" name="postCode" v-model="formInputs.postCode" autocomplete="postCode" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="street" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-road"></i>&nbsp;{{ trans('offer.street') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('offer.street')" rules="required|min:3|max:190" v-slot="{ errors }">
                                    <input id="street" type="text" class="form-control" name="street" v-model="formInputs.street" autocomplete="street" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-city"></i>&nbsp;{{ trans('offer.city') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('offer.city')" rules="required|min:3|max:190" v-slot="{ errors }">
                                    <input id="city" type="city" class="form-control" name="city" v-model="formInputs.city" autocomplete="city" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-phone"></i>&nbsp;{{ trans('offer.phone') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('offer.phone')" rules="required|min:3|max:190|integer" v-slot="{ errors }">
                                    <input id="phone" type="number" class="form-control" name="phone" v-model="formInputs.phone" autocomplete="phone" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <a class="btn btn-rounded btn-primary go-step4 text-white">
                                    {{ trans('buttons.step4') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="step4" role="tabpanel" aria-labelledby="step4">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="specialization_id"><i class="fas fa-diagnoses"></i>&nbsp;{{ trans('profile.specialization') }} <span class="text-danger font-weight-bolder">*</span></label>
                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('profile.specialization')" :rules="'oneOf:'+ specializationIds" v-slot="{ errors }">
                                    <select data-live-search="true" class="form-control" name="specialization_id" v-model="formInputs.specialization_id" id="specialization_id">
                                        <option selected>{{ trans('sentence.choose') }}</option>
                                        <option v-for="specialization in specializations" :key="specialization.id" :value="specialization.id">
                                            {{ specialization.name }}
                                        </option>
                                    </select>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="image_profile"><i class="fas fa-images"></i>&nbsp;{{ trans('sentence.upload-image') }} <span class="text-danger font-weight-bolder">*</span></label>
                            <div class="col-12 col-md-9">
                                <input type="file" class="form-control" name="image_profile[]" ref="file" @change="onFileChange();"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="min_salary" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-coins"></i>&nbsp;{{ trans('offer.min_salary') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('offer.min_salary')" rules="required" v-slot="{ errors }">
                                    <input min="0"
                                    id="min_salary" type="number" 
                                    class="form-control" name="min_salary" v-model="formInputs.min_salary" autocomplete="min_salary" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="max_salary" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-coins"></i>&nbsp;{{ trans('offer.max_salary') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('offer.max_salary')" rules="required" v-slot="{ errors }">
                                    <input min="0"
                                    id="max_salary" type="number" 
                                    class="form-control" name="max_salary" v-model="formInputs.max_salary" autocomplete="max_salary" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="currency_id"><i class="fas fa-coins"></i>&nbsp;{{ trans('offer.currency') }} <span class="text-danger font-weight-bolder">*</span></label>
                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('offer.currency')" :rules="'oneOf:'+ currencyIds" v-slot="{ errors }">
                                    <select data-live-search="true" class="form-control" v-model="formInputs.currency_id" id="currency_id">
                                        <option selected>{{ trans('sentence.choose') }}</option>
                                        <option v-for="currency in currencies" :key="currency.id" :value="currency.id">
                                            {{ currency.symbol }}
                                        </option>
                                    </select>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="settlement_id"><i class="fas fa-handshake"></i>&nbsp;{{ trans('offer.work-category') }} <span class="text-danger font-weight-bolder">*</span></label>
                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('offer.work-category')" :rules="'oneOf:'+ settlementIds" v-slot="{ errors }">
                                    <select data-live-search="true" class="form-control" v-model="formInputs.settlement_id" name="settlement_id" id="settlement_id">
                                        <option selected>{{ trans('sentence.choose') }}</option>
                                        <option v-for="settlement in settlements" :key="settlement.id" :value="settlement.id">
                                            {{ settlement.name }}
                                        </option>
                                    </select>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input custom-checkbox" 
                                        type="checkbox" name="negotiable" id="negotiable" v-model="formInputs.negotiable">
                                    <label class="form-check-label" for="negotiable">
                                        {{ trans('offer.salary_negotiable') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <ValidationProvider :name="trans('sentence.term1')" rules="required" v-slot="{ errors }">
                                        <input class="form-check-input custom-checkbox" 
                                            type="checkbox" name="term1" id="term1" v-model="formInputs.term1" value="1">
                                        <label class="form-check-label" for="term1">
                                            {{ trans('sentence.accept') }} <a href="/regulamin" class="text-lowercase">{{ trans('sentence.regulation') }}</a> EmployMed.eu
                                        </label>
                                        <span class="text-danger">{{ errors[0] }}</span >
                                    </ValidationProvider>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input custom-checkbox" 
                                        type="checkbox" name="term2" id="term2" v-model="formInputs.term2">
                                    <label class="form-check-label" for="term2">
                                        {{ trans('sentence.accept') }} <a href="/polityka-cookies" class="text-lowercase">{{ trans('sentence.cookies-policy') }}</a> EmployMed.eu
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input custom-checkbox" 
                                        type="checkbox" name="term3" id="term3" v-model="formInputs.term3">
                                    <label class="form-check-label" for="term3">
                                        {{ trans('sentence.data-conversion') }} EmployMed.eu
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-rounded btn-primary" :disabled="blockBtn === true">
                                    {{ trans('sentence.register') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </ValidationObserver>
</template>

<script>
    export default {
        data: function() {
            return {
                blockGus: false,
                blockBtn: false,
                successOutput: '',
                errorOutput: '',
                form: new FormData(),
                workIds: [],
                specializationIds: [],
                currencyIds: [],
                settlementIds: [],
                formInputs: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    company_name: '',
                    company_street: '',
                    company_post_code: '',
                    company_city: '',
                    company_nip: '',
                    title: '',
                    description: '',
                    profits: '',
                    requirements: '',
                    work_id: '',
                    postCode: '',
                    street: '',
                    city: '',
                    phone: '',
                    specialization_id: '',
                    image_profile: [],
                    min_salary: '',
                    max_salary: '',
                    currency_id: '',
                    settlement_id: '',
                    negotiable: false,
                    term1: false,
                    term2: false,
                    term3: false
                }
            }
        },
        props: [
            'works',
            'specializations',
            'currencies',
            'settlements'
        ],
        mounted() {
            this.getWorkIds();
            this.getSpecializationIds();
            this.getCurrencyIds();
            this.getSettlementIds();
        },
        methods: {
             exportHTML(){
                this.fillFormData();
                
                var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
                        "xmlns:w='urn:schemas-microsoft-com:office:word' "+
                        "xmlns='http://www.w3.org/TR/REC-html40'>"+
                        "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
                var footer = "</body></html>";

                var work = (this.formInputs.work_id-1 === -1) ? this.works[0].name : this.works[this.formInputs.work_id-1].name;
                var specialization = (this.formInputs.specialization_id-1 === -1) ? this.specializations[0].name : this.specializations[this.formInputs.specialization_id-1].name;
                var currency = (this.formInputs.currency_id-1 === -1) ? this.currencies[0].symbol : this.currencies[this.formInputs.currency_id-1].symbol;
                var settlement = (this.formInputs.settlement_id-1 === -1) ? this.settlements[0].name : this.settlements[this.formInputs.settlement_id-1].name;
             
                var sourceHTML = header+
                "<p>" + '<b>User name</b>' + ": " + this.formInputs.name + "</p>" +
                "<p>" + '<b>E-mail</b>' + ": " + this.formInputs.email + "</p>" +
                "<p>" + '<b>NIP</b>' + ": " + this.formInputs.company_nip + "</p>" +
                "<p>" + '<b>Company city</b>' + ": " + this.formInputs.company_name + "</p>" +
                "<p>" + '<b>Company street</b>' + ": " + this.formInputs.company_street + "</p>" +
                "<p>" + '<b>Company post code</b>' + ": " + this.formInputs.company_post_code + "</p>" +
                "<p>" + '<b>Company city</b>' + ": " + this.formInputs.company_city + "</p>" +
                "<p>" + '<b>Title</b>' + ": "+ "</p>" + this.formInputs.title  +
                "<p>" + '<b>Description</b>' + ": "+ "</p>" + this.formInputs.description  +
                "<p>" + '<b>Profits</b>' + ": "+ "</p>" + this.formInputs.profits +
                "<p>" + '<b>Requirements</b>' + ": "+ "</p>" + this.formInputs.requirements  +
                "<p>" + '<b>Work type</b>' + ": " + work + "</p>" +
                "<p>" + '<b>Street</b>' + ": " + this.formInputs.street + "</p>" +
                "<p>" + '<b>Phone</b>' + ": " + this.formInputs.phone + "</p>" +
                "<p>" + '<b>Specialization</b>' + ": " + specialization + "</p>" +
                "<p>" + '<b>Min salary</b>' + ": " + this.formInputs.min_salary + "</p>" +
                "<p>" + '<b>Max salary</b>' + ": " + this.formInputs.max_salary + "</p>" +
                "<p>" + '<b>Currency</b>' + ": " + currency + "</p>" +
                "<p>" + '<b>Settlement</b>' + ": " + settlement + "</p>" +
                "<p>" + '<b>Negotiable</b>' + ": " + this.formInputs.negotiable + "</p>" +
                "<p>" + '<b>Logo</b>' + ": " + "</p>" +
                footer;
                
                var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
                var fileDownload = document.createElement("a");
                document.body.appendChild(fileDownload);
                fileDownload.href = source;
                fileDownload.download = 'document.doc';
                fileDownload.click();
                document.body.removeChild(fileDownload);
            },
            getWorkIds() {
                for(var i=1; i <= this.works.length; i++) {
                    this.workIds.push(i);
                }

                return this.workIds = this.workIds.join();
            },
            getSpecializationIds() {
                for(var i=1; i <= this.specializations.length; i++) {
                    this.specializationIds.push(i);
                }
                
                return this.specializationIds = this.specializationIds.join();
            },
            getCurrencyIds() {
                for(var i=1; i <= this.currencies.length; i++) {
                    this.currencyIds.push(i);
                }
                
                return this.currencyIds = this.currencyIds.join();
            },
            getSettlementIds() {
                for(var i=1; i <= this.settlements.length; i++) {
                    this.settlementIds.push(i);
                }
                
                return this.settlementIds = this.settlementIds.join();
            },
            onFileChange() {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.formInputs.image_profile[0] = e.target.result;
                };
                reader.readAsDataURL(this.$refs.file.files[0]);
                vm.formInputs.image_profile[0] = this.$refs.file.files[0];
            },
            clearForm() {
                this.formInputs.name= '';
                this.formInputs.email= '';
                this.formInputs.password= '';
                this.formInputs.password_confirmation= '';
                this.formInputs.company_name= '';
                this.formInputs.company_street= '';
                this.formInputs.company_post_code= '';
                this.formInputs.company_city= '';
                this.formInputs.company_nip= '';
                this.formInputs.title= '';
                this.formInputs.description= '';
                this.formInputs.profits= '';
                this.formInputs.requirements= '';
                this.formInputs.work_id= '';
                this.formInputs.postCode= '';
                this.formInputs.street= '';
                this.formInputs.phone= '';
                this.formInputs.specialization_id= '';
                this.formInputs.image_profile= [];
                this.formInputs.min_salary= '';
                this.formInputs.max_salary= '';
                this.formInputs.currency_id= '';
                this.formInputs.settlement_id= '';
                this.formInputs.negotiable= false;
                this.formInputs.term1= false;
                this.formInputs.term2= false;
                this.formInputs.term3= false;
            },
            fillFormData() {
                this.form.append('company_city', this.formInputs.company_city);
                this.form.append('company_name', this.formInputs.company_name);
                this.form.append('company_nip', this.formInputs.company_nip);
                this.form.append('company_post_code', this.formInputs.company_post_code);
                this.form.append('company_street', this.formInputs.company_street);
                this.form.append('currency_id', this.formInputs.currency_id);
                this.form.append('description', this.formInputs.description);
                this.form.append('email', this.formInputs.email);
                this.form.append('max_salary', this.formInputs.max_salary);
                this.form.append('min_salary', this.formInputs.min_salary);
                this.form.append('name', this.formInputs.name);
                this.form.append('negotiable', this.formInputs.negotiable);
                this.form.append('password', this.formInputs.password);
                this.form.append('password_confirmation', this.formInputs.password_confirmation);
                this.form.append('phone', this.formInputs.phone);
                this.form.append('postCode', this.formInputs.postCode);
                this.form.append('city', this.formInputs.city);
                this.form.append('profits', this.formInputs.profits);
                this.form.append('requirements', this.formInputs.requirements);
                this.form.append('settlement_id', this.formInputs.settlement_id);
                this.form.append('specialization_id', this.formInputs.specialization_id);
                this.form.append('street', this.formInputs.street);
                this.form.append('term1', this.formInputs.term1);
                this.form.append('term2', this.formInputs.term2);
                this.form.append('term3', this.formInputs.term3);
                this.form.append('title', this.formInputs.title);
                this.form.append('work_id', this.formInputs.work_id);
                this.form.append('image_profile[0]', this.formInputs.image_profile[0]);
            },
            getCompanyData() {
                this.blockGus = true;
                axios.get('/get-company-info'+'/' + this.formInputs.company_nip)
                .then(response => {
                    if(response.data.data !== false){
                        this.formInputs.company_name = response.data.data.dane.Nazwa;
                        this.formInputs.company_city = response.data.data.dane.Miejscowosc;
                        this.formInputs.company_street = response.data.data.dane.Ulica.replace("ul. ", "");
                        this.formInputs.company_post_code = response.data.data.dane.KodPocztowy;
                        this.formInputs.postCode = response.data.data.dane.KodPocztowy;
                        this.formInputs.street = response.data.data.dane.Ulica.replace("ul. ", "");
                        this.formInputs.city = response.data.data.dane.Miejscowosc;
                        this.form.append('company_city', this.formInputs.company_city);
                        this.form.append('company_street', this.formInputs.company_street);
                        this.form.append('company_name', this.formInputs.company_name);
                        this.form.append('company_post_code', this.formInputs.company_post_code);
                        this.form.append('postCode', this.formInputs.postCode);
                        this.form.append('street', this.formInputs.street);
                        this.form.append('city', this.formInputs.city);

                        this.$toasted.info('Uzupełnij numer ulicy w polu Adres firmy', {
                            duration: 6000
                        });
                        this.blockGus = false;
                    } else {
                        this.$toasted.error(Vue.prototype.trans('notifications.invalid-nip'), {
                            duration: 6000
                        });
                        this.blockGus = false;
                    }
                })
                .catch(error => {
                    this.errorOutput = error.response.data.errors.title[0];
                    this.$toasted.error(this.errorOutput, {
                            duration: 6000
                    });
                });
            },
            submitForm(e) {
                this.blockBtn = true;
                this.fillFormData();
                let currentObj = this;
                axios.post('/rejestracja-zagranica', this.form,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    currentObj.successOutput = response.data.message;

                    if(response.data.message.substring(0,17) === 'Undefined offset:'
                    || response.data.message.substring(0,17) === 'file_get_contents') {
                        this.$toasted.success(Vue.prototype.trans('notifications.invalid-company-address'), {
                            duration: 6000
                        });
                        return;
                    }
                    if(response.data.status == 200 || response.data.status == 201)
                    {
                        this.$toasted.success(currentObj.successOutput, {
                            duration: 6000
                        });
                        this.clearForm();
                    }
                    this.blockBtn = false;
                })
                .catch(error => {
                    currentObj.errorOutput = error.response.data.errors.title[0];
                    this.$toasted.error(currentObj.errorOutput, {
                        duration: 6000
                    });
                    this.blockBtn = false;
                });
            }
        }
    }
</script>
