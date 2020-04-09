<template>
    <ValidationObserver v-slot="{ handleSubmit }">
        <form method="POST" @submit.prevent="handleSubmit(submitForm)" enctype="multipart/form-data">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="step1" role="tabpanel" aria-labelledby="step1">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.title') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('sentence.title')" rules="required|min:3|max:190" v-slot="{ errors }">
                                    <input id="title" type="text" class="form-control" name="title" v-model="formInputs.title" autocomplete="title" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('offer.description') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <tinymce id="description" name="description" v-model="formInputs.description">
                                    {{ formInputs.description }}
                                </tinymce>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profits" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('offer.profits') }}</label>

                            <div class="col-12 col-md-9">
                                <tinymce id="profits" name="profits" v-model="formInputs.profits">
                                    {{ formInputs.profits }}
                                </tinymce>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="requirements" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('offer.requirements') }}</label>

                            <div class="col-12 col-md-9">
                                <tinymce id="requirements" name="requirements" v-model="formInputs.requirements">
                                    {{ formInputs.requirements }}
                                </tinymce>
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
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="work_id">{{ trans('offer.settlement') }} <span class="text-danger font-weight-bolder">*</span></label>
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
                            <label for="postCode" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('offer.post_code') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('offer.post_code')" rules="required" v-slot="{ errors }">
                                    <input id="post_code" type="text" class="form-control" name="postCode" v-model="formInputs.postCode" autocomplete="postCode" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="street" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('offer.street') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('offer.street')" rules="required|min:3|max:190" v-slot="{ errors }">
                                    <input id="street" type="text" class="form-control" name="street" v-model="formInputs.street" autocomplete="street" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('offer.city') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('offer.city')" rules="required|min:3|max:190" v-slot="{ errors }">
                                    <input id="city" type="text" class="form-control" name="city" v-model="formInputs.city" autocomplete="city" autofocus>
                                    <span class="text-danger">{{ errors[0] }}</span >
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('offer.phone') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <ValidationProvider :name="trans('offer.phone')" rules="required|min:3|max:190|integer" v-slot="{ errors }">
                                    <input id="phone" type="number" class="form-control" name="phone" v-model="formInputs.phone" autocomplete="phone" autofocus>
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
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="specialization_id">{{ trans('profile.specialization') }} <span class="text-danger font-weight-bolder">*</span></label>
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
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="image_profile">{{ trans('sentence.upload-image') }} <span class="text-danger font-weight-bolder">*</span></label>
                            <div class="col-12 col-md-9">
                                <input type="file" class="form-control" name="image_profile[]" ref="file" @change="onFileChange();" multiple/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="min_salary" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('offer.min_salary') }} <span class="text-danger font-weight-bolder">*</span></label>

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
                            <label for="max_salary" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('offer.max_salary') }} <span class="text-danger font-weight-bolder">*</span></label>

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
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="currency_id">{{ trans('offer.currency') }} <span class="text-danger font-weight-bolder">*</span></label>
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
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="settlement_id">{{ trans('offer.work-category') }} <span class="text-danger font-weight-bolder">*</span></label>
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
                                    {{ trans('buttons.btn-create') }}
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
                blockBtn: false,
                successOutput: '',
                errorOutput: '',
                form: new FormData(),
                tag: '',
                workIds: [],
                specializationIds: [],
                currencyIds: [],
                settlementIds: [],
                formInputs: {
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
            'settlements',
            'user'
        ],
        mounted() {
            this.getWorkIds();
            this.getSpecializationIds();
            this.getCurrencyIds();
            this.getSettlementIds();
        },
        methods: {
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
            onFileChange(event) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.formInputs.image_profile[0] = e.target.result;
                };
                reader.readAsDataURL(this.$refs.file.files[0]);
                vm.formInputs.image_profile[0] = this.$refs.file.files[0];
            },
            clearForm() {
                this.formInputs.title= '';
                this.formInputs.description= '';
                this.formInputs.profits= '';
                this.formInputs.requirements= '';
                this.formInputs.work_id= '';
                this.formInputs.postCode= '';
                this.formInputs.street= '';
                this.formInputs.city= '';
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
                this.form.append('email', this.user.email);
                this.form.append('currency_id', this.formInputs.currency_id);
                this.form.append('description', this.formInputs.description);
                this.form.append('image_profile[0]', this.formInputs.image_profile[0]);
                this.form.append('max_salary', this.formInputs.max_salary);
                this.form.append('min_salary', this.formInputs.min_salary);
                this.form.append('negotiable', this.formInputs.negotiable);
                this.form.append('phone', this.formInputs.phone);
                this.form.append('postCode', this.formInputs.postCode);
                this.form.append('profits', this.formInputs.profits);
                this.form.append('requirements', this.formInputs.requirements);
                this.form.append('settlement_id', this.formInputs.settlement_id);
                this.form.append('specialization_id', this.formInputs.specialization_id);
                this.form.append('street', this.formInputs.street);
                this.form.append('city', this.formInputs.city);
                this.form.append('term1', this.formInputs.term1);
                this.form.append('term2', this.formInputs.term2);
                this.form.append('term3', this.formInputs.term3);
                this.form.append('title', this.formInputs.title);
                this.form.append('work_id', this.formInputs.work_id);
            },
            submitForm(e) {
                this.blockBtn = true;
                this.fillFormData();
                let currentObj = this;
                axios.post('create', this.form)
                .then(response => {
                    this.blockBtn = false;
                    currentObj.successOutput = response.data.message;
                    
                    if(response.data.message.substring(0,17) === 'Undefined offset:'
                    || response.data.message.substring(0,17) === 'file_get_contents') {
                        this.$toasted.success(Vue.prototype.trans('notifications.invalid-company-address'));
                        return;
                    }
                    if(response.data.status == 200 || response.data.status == 201)
                    {
                        this.$toasted.success(currentObj.successOutput);
                        this.clearForm();
                    }
                })
                .catch(error => {
                    this.blockBtn = false;
                    currentObj.errorOutput = error.response.data.errors.title[0];
                    this.$toasted.error(currentObj.errorOutput);
                });
            }
        }
    }
</script>
