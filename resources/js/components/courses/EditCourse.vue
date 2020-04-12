<template>
    <ValidationObserver v-slot="{ handleSubmit }">
        <form @submit.prevent="handleSubmit(submitForm)" enctype="multipart/form-data">
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
                                <option v-for="state in states" 
                                :selected="state.id === formInputs.state_id" 
                                :key="state.id" 
                                :value="state.id">
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

                <div class="form-group row mb-0">
                    <div class="col-12">
                        <button type="submit" class="btn btn-rounded btn-primary" :disabled="blockBtn === true">
                            {{ trans('buttons.btn-update') }}
                        </button>
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
                locationIds: [],
                stateIds: [],
                specializationIds: [],
                currencyIds: [],
                formInputs: {
                    start_date: '',
                    end_date: '',
                    points: 0,
                    title: '',
                    description: '',
                    location_id: '',
                    state_id: '',
                    postCode: '',
                    street: '',
                    phone: '',
                    specialization_id: '',
                    galleries: [],
                    price: 0,
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
            'currencies',
            'course'
        ],
        mounted() {
            this.getLocationIds();
            this.getStateIds();
            this.getSpecializationIds();
            this.getCurrencyIds();
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.formInputs.title = this.course.title;
                this.formInputs.description = this.course.description;
                this.formInputs.postCode = this.course.postCode;
                this.formInputs.street = this.course.street;
                this.formInputs.phone = this.course.phone;
                this.formInputs.price = this.course.price;
                this.formInputs.start_date = this.course.start_date;
                this.formInputs.end_date = this.course.end_date;
                this.formInputs.points = (this.course.points === null) ? 0 : this.course.points;
                this.formInputs.facebook = (this.course.facebook === null) ? '' : this.course.facebook;
                this.formInputs.state_id = this.course.state_id;
                this.formInputs.location_id = this.course.location_id;
                this.formInputs.specialization_id = this.course.specialization_id;
                this.formInputs.currency_id = this.course.currency_id;
                this.formInputs.term1 = this.course.term1;
                this.formInputs.term2 = this.course.term2;
                this.formInputs.term3 = this.course.term3;
                tinymce.editors[0].setContent(this.formInputs.description, { format: 'raw' });
            },
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
                this.form.append('currency_id', this.formInputs.currency_id);
                this.form.append('description', this.formInputs.description);
                this.form.append('email', this.formInputs.email);
                this.form.append('location_id', this.formInputs.location_id);
                this.form.append('price', this.formInputs.price);
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
            submitForm(e) {
                this.blockBtn = true;
                this.fillFormData();
                let currentObj = this;
                
                axios.post('update', this.form,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    currentObj.successOutput = response.data.message;
                    this.$toasted.success(currentObj.successOutput, {
                        duration: 6000
                    });
                    if(response.data.status === 200)
                    {
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
