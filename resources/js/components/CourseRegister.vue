<template>
    <ValidationObserver v-slot="{ handleSubmit }">
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
                            <label for="email" class="col-md-4 col-form-label text-md-right"><i class="fas fa-envelope-open-text"></i>&nbsp;E-Mail <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-md-6">
                                <ValidationProvider name="email" rules="required|email" v-slot="{ errors }">
                                    <input id="email" type="email" class="form-control" name="email" v-model="formInputs.email" autocomplete="email">
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>
                        <ValidationObserver>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fas fa-lock"></i>&nbsp;{{ trans('sentence.password') }} <span class="text-danger font-weight-bolder">*</span></label>

                                <div class="col-md-6">
                                    <ValidationProvider :name="trans('sentence.password')" rules="required|min:8|confirmed:password-confirm" v-slot="{ errors }">
                                        <input id="password" type="password" class="form-control" name="password" v-model="formInputs.password" autocomplete="new-password">
                                        <span class="text-danger">{{ errors[0] }}</span >
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><i class="fas fa-lock"></i>&nbsp;{{ trans('profile.confirm_password') }} <span class="text-danger font-weight-bolder">*</span></label>

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
                            <label for="start_course_date" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-calendar-plus"></i>&nbsp;{{ trans('profile.start_date') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('profile.start_date')" rules="required" v-slot="{ errors }">
                                    <datepicker
                                    v-model="formInputs.start_date" 
                                    :format="'yyyy-MM-dd'" 
                                    placeholder="YYYY-MM-DD" 
                                    bootstrap-styling
                                    use-utc
                                    input-class="form-control"
                                    calendar-button-icon="fa fa-calendar"></datepicker>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_course_date" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-calendar-minus"></i>&nbsp;{{ trans('profile.end_date') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('profile.end_date')" rules="required" v-slot="{ errors }">
                                    <datepicker
                                    v-model="formInputs.end_date" 
                                    :format="'yyyy-MM-dd'" 
                                    placeholder="YYYY-MM-DD" 
                                    bootstrap-styling
                                    :use-utc="true"
                                    input-class="form-control"
                                    calendar-button-icon="fa fa-calendar"></datepicker>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
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
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="location_id"><i class="fas fa-city"></i>&nbsp;{{ trans('offer.location') }} <span class="text-danger font-weight-bolder">*</span></label>
                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('offer.location')" :rules="'oneOf:' + locationIds" v-slot="{ errors }">
                                    <select data-live-search="true" class="form-control" name="location_id" v-model="formInputs.location_id" id="location_id">
                                        <option selected>{{ trans('sentence.choose') }}</option>
                                        <option v-for="location in locations" :key="location.id" :value="location.id">
                                            {{ location.city }}
                                        </option>
                                    </select>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="state_id"><i class="fas fa-flag"></i>&nbsp;{{ trans('offer.state') }} <span class="text-danger font-weight-bolder">*</span></label>
                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('offer.state')" :rules="'oneOf:' + stateIds" v-slot="{ errors }">
                                    <select data-live-search="true" class="form-control" name="state_id" v-model="formInputs.state_id" id="state_id">
                                        <option selected>{{ trans('sentence.choose') }}</option>
                                        <option v-for="state in states" :key="state.id" :value="state.id">
                                            {{ state.name }}
                                        </option>
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
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="galleries"><i class="fas fa-images"></i>&nbsp;{{ trans('sentence.upload-image') }} <span class="text-danger font-weight-bolder">*</span></label>
                            <div class="col-12 col-md-9">
                                <input type="file" class="form-control" name="galleries[]" ref="file" @change="onFileChange();" multiple/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="points" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-star-half-alt"></i>&nbsp;{{ trans('sentence.points') }}</label>

                            <div class="col-12 col-md-9">
                                <input min="0" id="points" type="number" 
                                class="form-control" name="points" 
                                v-model="formInputs.points" autocomplete="points" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-money-bill-wave"></i>&nbsp;{{ trans('sentence.price') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('sentence.price')" rules="required" v-slot="{ errors }">
                                    <input min="0"
                                    id="price" type="number" 
                                    class="form-control" name="price" v-model="formInputs.price" autocomplete="price" autofocus>
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
                            <label for="facebook" class="col-12 col-md-3 col-form-label text-md-right"><i class="fab fa-facebook"></i>&nbsp;Facebook</label>

                            <div class="col-12 col-md-9">
                                <input  id="facebook" type="text" 
                                class="form-control" name="facebook" 
                                v-model="formInputs.facebook" autocomplete="facebook" autofocus>
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
                locationIds: [],
                stateIds: [],
                specializationIds: [],
                currencyIds: [],
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
                    start_date: '',
                    end_date: '',
                    points: '',
                    title: '',
                    description: '',
                    location_id: '',
                    state_id: '',
                    postCode: '',
                    street: '',
                    phone: '',
                    specialization_id: '',
                    galleries: [],
                    price: '',
                    currency_id: '',
                    facebook: '',
                    term1: false,
                    term2: false,
                    term3: false
                }
            }
        },
        props: [
            'states',
            'locations',
            'specializations',
            'currencies'
        ],
        mounted() {
            this.getLocationIds();
            this.getStateIds();
            this.getSpecializationIds();
            this.getCurrencyIds();
        },
        methods: {
            getLocationIds() {
                for(var i=1; i <= this.locations.length; i++) {
                    this.locationIds.push(i);
                }

                return this.locationIds = this.locationIds.join();
            },
            getStateIds() {
                for(var i=1; i <= this.states.length; i++) {
                    this.stateIds.push(i);
                }

                return this.stateIds = this.stateIds.join();
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
            onFileChange() {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.formInputs.galleries[0] = e.target.result;
                };
                reader.readAsDataURL(this.$refs.file.files[0]);
                vm.formInputs.galleries[0] = this.$refs.file.files[0];
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
                this.formInputs.location_id= '';
                this.formInputs.state_id= '';
                this.formInputs.postCode= '';
                this.formInputs.street= '';
                this.formInputs.phone= '';
                this.formInputs.specialization_id= '';
                this.formInputs.galleries= [];
                this.formInputs.price= '';
                this.formInputs.currency_id= '';
                this.formInputs.points= '';
                this.formInputs.facebook = '';
                this.formInputs.term1= false;
                this.formInputs.term2= false;
                this.formInputs.term3= false;
            },
            fillFormData() {
                var start = new Date(this.formInputs.start_date);
                var end = new Date(this.formInputs.end_date);
                var ys = start.getFullYear();
                var ms = (start.getMonth() + 1) < 10 ? '0' + (parseInt(start.getMonth() + 1)) : (parseInt(start.getMonth() + 1));
                var ds = (start.getDate()) < 10 ? '0' + (parseInt(start.getDate())) : (parseInt(start.getDate()));
                var ye = end.getFullYear();
                var me = (end.getMonth() + 1) < 10 ? '0' + (parseInt(end.getMonth() + 1)) : (parseInt(end.getMonth() + 1));
                var de = (end.getDate()) < 10 ? '0' + (parseInt(end.getDate())) : (parseInt(end.getDate()));
                this.form.append('company_city', this.formInputs.company_city);
                this.form.append('company_name', this.formInputs.company_name);
                this.form.append('company_nip', this.formInputs.company_nip);
                this.form.append('company_post_code', this.formInputs.company_post_code);
                this.form.append('company_street', this.formInputs.company_street);
                this.form.append('currency_id', this.formInputs.currency_id);
                this.form.append('description', this.formInputs.description);
                this.form.append('email', this.formInputs.email);
                this.form.append('location_id', this.formInputs.location_id);
                this.form.append('price', this.formInputs.price);
                this.form.append('name', this.formInputs.name);
                this.form.append('password', this.formInputs.password);
                this.form.append('password_confirmation', this.formInputs.password_confirmation);
                this.form.append('phone', this.formInputs.phone);
                this.form.append('postCode', this.formInputs.postCode);
                this.form.append('specialization_id', this.formInputs.specialization_id);
                this.form.append('state_id', this.formInputs.state_id);
                this.form.append('street', this.formInputs.street);
                this.form.append('start_date', ys + '-' + ms + '-' + ds);
                this.form.append('end_date', ye + '-' + me + '-' + de);
                this.form.append('points', this.formInputs.points);
                this.form.append('facebook', this.formInputs.facebook);
                this.form.append('term1', this.formInputs.term1);
                this.form.append('term2', this.formInputs.term2);
                this.form.append('term3', this.formInputs.term3);
                this.form.append('title', this.formInputs.title);
                this.form.append('galleries[0]', this.formInputs.galleries[0]);
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
                        this.form.append('company_city', this.formInputs.company_city);
                        this.form.append('company_street', this.formInputs.company_street);
                        this.form.append('company_name', this.formInputs.company_name);
                        this.form.append('company_post_code', this.formInputs.company_post_code);
                        this.form.append('postCode', this.formInputs.postCode);
                        this.form.append('street', this.formInputs.street);

                        this.$toasted.info(Vue.prototype.trans('notifications.fill-street-number'), {
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
                axios.post('/rejestracja-kurs', this.form,
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
                        
                        this.blockBtn = false;
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
                this.blockBtn = false;
            }
        }
    }
</script>
