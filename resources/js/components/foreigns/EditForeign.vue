<template>
    <ValidationObserver v-slot="{ handleSubmit }">
        <form @submit.prevent="handleSubmit(submitForm)" enctype="multipart/form-data">

            <div class="form-group row">
                <label for="title" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-heading"></i>&nbsp;{{ trans('sentence.title') }} <span class="text-danger font-weight-bolder">*</span></label>

                <div class="col-12 col-md-9">
                    <ValidationProvider :name="trans('sentence.title')" rules="required|min:3|max:190" v-slot="{ errors }">
                        <input id="title" type="text" class="form-control" name="title" v-model="formInputs.title" @focus="onFocus('title')" autocomplete="title" autofocus>
                        <span class="text-danger">{{ errors[0] }}</span >
                    </ValidationProvider>
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-audio-description"></i>&nbsp;{{ trans('offer.description') }} <span class="text-danger font-weight-bolder">*</span></label>

                <div class="col-12 col-md-9">
                    <tinymce id="description" name="description" 
                    v-model="formInputs.description"></tinymce>
                </div>
            </div>

            <div class="form-group row">
                <label for="profits" class="col-12 col-md-3 col-form-label text-md-right"><i class="fab fa-product-hunt"></i>&nbsp;{{ trans('offer.profits') }}</label>

                <div class="col-12 col-md-9">
                    <tinymce id="profits" name="profits" v-model="formInputs.profits"></tinymce>
                </div>
            </div>

            <div class="form-group row">
                <label for="requirements" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-align-justify"></i>&nbsp;{{ trans('offer.requirements') }}</label>

                <div class="col-12 col-md-9">
                    <tinymce id="requirements" name="requirements" v-model="formInputs.requirements"></tinymce>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-12 col-md-3 col-form-label text-md-right" for="work_id"><i class="fas fa-file-contract"></i>&nbsp;{{ trans('offer.settlement') }} <span class="text-danger font-weight-bolder">*</span></label>
                <div class="col-12 col-md-9">
                    <ValidationProvider :name="trans('offer.settlement')" :rules="'oneOf:' + workIds" v-slot="{ errors }">
                        <select data-live-search="true" class="form-control" 
                        name="work_id" id="work_id" v-model="formInputs.work_id" 
                        @focus="onFocus('work_id')">
                            <option selected>{{ trans('sentence.choose') }}</option>
                            <option :value="work.id" 
                            v-for="work in works" 
                            :selected="work.id === formInputs.work_id" 
                            :key="work.id">
                            {{ work.name }}
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
                        <input id="post_code" type="text" class="form-control" 
                        name="postCode" v-model="formInputs.postCode" 
                        @focus="onFocus('postCode')"
                        autocomplete="postCode" autofocus>
                        <span class="text-danger">{{ errors[0] }}</span >
                    </ValidationProvider>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="street" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-road"></i>&nbsp;{{ trans('offer.street') }} <span class="text-danger font-weight-bolder">*</span></label>

                <div class="col-12 col-md-9">
                    <ValidationProvider :name="trans('offer.street')" rules="required|min:3|max:190" v-slot="{ errors }">
                        <input id="street" type="text" class="form-control"
                        name="street" v-model="formInputs.street"
                        @focus="onFocus('street')" 
                        autocomplete="street" autofocus>
                        <span class="text-danger">{{ errors[0] }}</span >
                    </ValidationProvider>
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-city"></i>&nbsp;{{ trans('offer.city') }} <span class="text-danger font-weight-bolder">*</span></label>

                <div class="col-12 col-md-9">
                    <ValidationProvider :name="trans('offer.city')" rules="required|min:3|max:190" v-slot="{ errors }">
                        <input id="city" type="text" class="form-control"
                        name="city" v-model="formInputs.city"
                        @focus="onFocus('city')" 
                        autocomplete="city" autofocus>
                        <span class="text-danger">{{ errors[0] }}</span >
                    </ValidationProvider>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-12 col-md-3 col-form-label text-md-right" for="specialization_id"><i class="fas fa-diagnoses"></i>&nbsp;{{ trans('profile.specialization') }} <span class="text-danger font-weight-bolder">*</span></label>
                <div class="col-12 col-md-9">
                    <ValidationProvider :name="trans('profile.specialization')" :rules="'oneOf:'+ specializationIds" v-slot="{ errors }">
                        <select data-live-search="true" class="form-control" 
                        name="specialization_id" id="specialization_id" 
                        v-model="formInputs.specialization_id" 
                        @focus="onFocus('specialization_id')">
                            <option>{{ trans('sentence.choose') }}</option>
                            <option :value="specialization.id" 
                            v-for="specialization in specializations" 
                            :selected="specialization.id === formInputs.specialization_id"
                            :key="specialization.id">
                                {{ specialization.name }}
                            </option> 
                        </select>
                        <span class="text-danger">{{ errors[0] }}</span >
                    </ValidationProvider>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-envelope-open-text"></i>&nbsp;E-Mail <span class="text-danger font-weight-bolder">*</span></label>

                <div class="col-12 col-md-9">
                    <ValidationProvider name="email" rules="required|email" v-slot="{ errors }">
                        <input id="email" type="email" class="form-control" 
                        name="email" v-model="formInputs.email" 
                        @focus="onFocus('email')" 
                        autocomplete="email" autofocus>
                        <span class="text-danger">{{ errors[0] }}</span >
                    </ValidationProvider>
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-12 col-md-3 col-form-label text-md-right">
                    {{ trans('offer.phone') }} <span class="text-danger font-weight-bolder">*</span>
                </label>

                <div class="col-12 col-md-9">
                    <ValidationProvider :name="trans('offer.phone')" rules="required|min:3|max:190|integer" v-slot="{ errors }">
                        <input id="phone" type="phone" class="form-control" 
                        name="phone" v-model="formInputs.phone" 
                        @focus="onFocus('phone')"  
                        autocomplete="phone" autofocus>
                        <span class="text-danger">{{ errors[0] }}</span >
                    </ValidationProvider>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-12 col-md-3 col-form-label text-md-right" for="settlement_id"><i class="fas fa-handshake"></i>&nbsp;{{ trans('offer.work-category') }} <span class="text-danger font-weight-bolder">*</span></label>
                <div class="col-12 col-md-9">
                    <ValidationProvider :name="trans('offer.work-category')" :rules="'oneOf:'+ settlementIds" v-slot="{ errors }">
                        <select data-live-search="true" 
                        class="form-control" name="settlement_id" 
                        id="settlement_id"
                        v-model="formInputs.settlement_id" 
                        @focus="onFocus('settlement_id')">
                            <option selected>{{ trans('sentence.choose') }}</option>
                            <option :value="settlement.id" v-for="settlement in settlements" :key="settlement.id" selected>{{ settlement.name }}</option> 
                        </select>
                        <span class="text-danger">{{ errors[0] }}</span >
                    </ValidationProvider>
                </div>
            </div>

            <div class="form-group row">
                <label for="min_salary" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-coins"></i>&nbsp;{{ trans('offer.min_salary') }} <span class="text-danger font-weight-bolder">*</span></label>

                <div class="col-12 col-md-9">
                    <input min="0"
                        id="min_salary" type="number" 
                        class="form-control" name="min_salary" :value="formInputs.min_salary" autocomplete="min_salary" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="max_salary" class="col-12 col-md-3 col-form-label text-md-right"><i class="fas fa-coins"></i>&nbsp;{{ trans('offer.max_salary') }} <span class="text-danger font-weight-bolder">*</span></label>

                <div class="col-12 col-md-9">
                    <input min="0" id="max_salary" type="number" 
                        class="form-control" name="max_salary" 
                        :value="formInputs.max_salary" 
                        autocomplete="max_salary" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-12 col-md-3 col-form-label text-md-right" for="currency_id"><i class="fas fa-coins"></i>&nbsp;{{ trans('offer.currency') }} <span class="text-danger font-weight-bolder">*</span></label>
                <div class="col-12 col-md-9">
                    <select data-live-search="true" class="form-control" name="currency_id" id="currency_id">
                        <option selected>{{ trans('sentence.choose') }}</option>
                        <option :value="currency.id" v-for="currency in currencies" :key="currency.id" selected>{{ currency.name }}</option> 
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                    <div class="form-check">
                        <input class="form-check-input custom-checkbox" 
                            type="checkbox" name="negotiable" id="negotiable"
                            :checked="formInputs.negotiable === 1"
                            v-model="formInputs.negotiable">
                        <label class="form-check-label" for="negotiable">
                            {{ trans('offer.salary_negotiable') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-12">
                    <button type="submit" class="btn btn-rounded btn-success">
                        {{ trans('buttons.btn-update') }}
                    </button>
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
                    title: '',
                    description: '',
                    profits: '',
                    requirements: '',
                    work_id: '',
                    postCode: '',
                    street: '',
                    city: '',
                    phone: '',
                    email: '',
                    specialization_id: '',
                    min_salary: '',
                    max_salary: '',
                    currency_id: '',
                    settlement_id: '',
                    negotiable: false
                }
            }
        },
        props: [
            'works',
            'specializations',
            'currencies',
            'settlements',
            'foreign'
        ],
        mounted() {
            this.getWorkIds();
            this.getSpecializationIds();
            this.getCurrencyIds();
            this.getSettlementIds();
            this.fetchData();
        },
        methods: {
            onFocus(e) {
                this.focused = e
            },
            fetchData() {
                this.formInputs.title= this.foreign.title;
                this.formInputs.description= this.foreign.description;
                this.formInputs.profits= this.foreign.profits;
                this.formInputs.requirements= this.foreign.requirements;
                this.formInputs.work_id= this.foreign.work_id;
                this.formInputs.postCode= this.foreign.postCode;
                this.formInputs.street= this.foreign.street;
                this.formInputs.city= this.foreign.city;
                this.formInputs.phone= this.foreign.phone;
                this.formInputs.email= this.foreign.email;
                this.formInputs.specialization_id= this.foreign.specialization_id;
                this.formInputs.min_salary= this.foreign.min_salary;
                this.formInputs.max_salary= this.foreign.max_salary;
                this.formInputs.currency_id= this.foreign.currency_id;
                this.formInputs.settlement_id= this.foreign.settlement_id;
                this.formInputs.negotiable= this.foreign.negotiable;
                tinymce.editors[0].setContent(this.formInputs.description, { format: 'raw' });
                tinymce.editors[1].setContent(this.formInputs.profits, { format: 'raw' });
                tinymce.editors[2].setContent(this.formInputs.requirements, { format: 'raw' });
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
            onFileChange(event) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.formInputs.galleries[0] = e.target.result;
                };
                reader.readAsDataURL(this.$refs.file.files[0]);
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
                this.form.append('email', this.formInputs.email);
                this.form.append('currency_id', this.formInputs.currency_id);
                this.form.append('description', this.formInputs.description);
                this.form.append('max_salary', this.formInputs.max_salary);
                this.form.append('min_salary', this.formInputs.min_salary);
                this.form.append('negotiable', this.formInputs.negotiable);
                this.form.append('phone', this.formInputs.phone);
                this.form.append('email', this.formInputs.email);
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
                
                axios.post('update', this.formInputs)
                .then(response => {
                    this.blockBtn = false;

                    if(response.data.message.substring(0,17) === 'Undefined offset:'
                    || response.data.message.substring(0,17) === 'file_get_contents') {
                        this.$toasted.success(Vue.prototype.trans('notifications.invalid-company-address'));
                        return;
                    }
                    if(response.data.status === 200 || 201)
                    {
                        currentObj.successOutput = response.data.message;
                        this.$toasted.success(currentObj.successOutput);
                    } else {
                        currentObj.errorOutput = response.data.errors.title[0];
                        this.$toasted.error(currentObj.errorOutput);
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
