<template>
    <form method="POST" novalidate enctype="multipart/form-data">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="step1" role="tabpanel" aria-labelledby="step1">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ $t('sentence.username') }} <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" v-model="formInputs.name" autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" v-model="formInputs.email" autocomplete="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ $t('sentence.password') }} <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" v-model="formInputs.password" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ $t('sentence.confirm_password') }} <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="formInputs.password_confirmation" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ $t('sentence.company_name') }} <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-md-6">
                            <input id="company_name" type="text" class="form-control" name="company_name" v-model="formInputs.company_name" autocomplete="company_name" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_street" class="col-md-4 col-form-label text-md-right">{{ $t('sentence.company_street') }} <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-md-6">
                            <input id="company_street" type="text" class="form-control" name="company_street" v-model="formInputs.company_street" autocomplete="company_street" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_post_code" class="col-md-4 col-form-label text-md-right">{{ $t('sentence.company_post_code') }} <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-md-6">
                            <input id="company_post_code" type="text" class="form-control" name="company_post_code" v-model="formInputs.company_post_code" autocomplete="company_post_code" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_city" class="col-md-4 col-form-label text-md-right">{{ $t('sentence.company_city') }} <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-md-6">
                            <input id="company_city" type="text" class="form-control" name="company_city" v-model="formInputs.company_city" autocomplete="company_city" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_nip" class="col-md-4 col-form-label text-md-right">{{ $t('sentence.company_nip') }} <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-md-6">
                            <input id="company_nip" type="number" class="form-control" name="company_nip" v-model="formInputs.company_nip" autocomplete="company_nip" autofocus>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-12">
                            <a class="btn btn-primary go-step2 text-white">
                                {{ $t('sentence.step2') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="title" class="col-12 col-md-3 col-form-label text-md-right">{{ $t('sentence.title') }} <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-12 col-md-9">
                            <input id="title" type="title" class="form-control" name="title" v-model="formInputs.title" autocomplete="title" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-12 col-md-3 col-form-label text-md-right">{{ $t('sentence.description') }} <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-12 col-md-9">
                            <textarea id="description" class="form-control" name="description" v-model="formInputs.description" autocomplete="description" autofocus rows="3">
                                {{ formInputs.description }}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="profits" class="col-12 col-md-3 col-form-label text-md-right">{{ $t('sentence.profits') }}</label>

                        <div class="col-12 col-md-9">
                            <textarea id="profits" class="form-control" name="profits" v-model="formInputs.profits" autocomplete="profits" autofocus rows="3">
                                {{ formInputs.profits }}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="requirements" class="col-12 col-md-3 col-form-label text-md-right">{{ $t('sentence.requirements') }}</label>

                        <div class="col-12 col-md-9">
                            <textarea id="requirements" class="form-control" name="requirements" v-model="formInputs.requirements" autocomplete="requirements" autofocus rows="3">
                                {{ formInputs.requirements }}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-12">
                            <a class="btn btn-primary go-step3 text-white">
                                {{ $t('sentence.step3') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-12 col-md-3 col-form-label text-md-right" for="work_id">{{ $t('sentence.settlement') }} <span class="text-danger font-weight-bolder">*</span></label>
                        <div class="col-12 col-md-9">
                            <select data-live-search="true" class="form-control" name="work_id" v-model="formInputs.work_id" id="work_id">
                                <option selected>{{ $t('sentence.choose') }}</option>
                                <option v-for="work in works" :key="work.id">{{ work.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-3 col-form-label text-md-right" for="location_id">{{ $t('sentence.location') }} <span class="text-danger font-weight-bolder">*</span></label>
                        <div class="col-12 col-md-9">
                            <select data-live-search="true" class="form-control" name="location_id" v-model="formInputs.location_id" id="location_id">
                                <option selected>{{ $t('sentence.choose') }}</option>
                                <option v-for="location in locations" :key="location.id">
                                    {{ location.city }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-3 col-form-label text-md-right" for="state_id">{{ $t('sentence.state') }} <span class="text-danger font-weight-bolder">*</span></label>
                        <div class="col-12 col-md-9">
                            <select data-live-search="true" class="form-control" name="state_id" v-model="formInputs.state_id" id="state_id">
                                <option selected>{{ $t('sentence.choose') }}</option>
                                <option v-for="state in states" :key="state.id">
                                    {{ state.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="postCode" class="col-12 col-md-3 col-form-label text-md-right">{{ $t('sentence.post_code') }} <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-12 col-md-9">
                            <input id="post_code" type="text" class="form-control" name="postCode" v-model="formInputs.postCode" autocomplete="postCode" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="street" class="col-12 col-md-3 col-form-label text-md-right">{{ $t('sentence.street') }} <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-12 col-md-9">
                            <input id="street" type="street" class="form-control" name="street" v-model="formInputs.street" autocomplete="street" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-12 col-md-3 col-form-label text-md-right">{{ $t('sentence.phone') }} <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-12 col-md-9">
                            <input id="phone" type="phone" class="form-control" name="phone" v-model="formInputs.phone" autocomplete="phone" autofocus>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-12">
                            <a class="btn btn-primary go-step4 text-white">
                                {{ $t('sentence.step4') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="step4" role="tabpanel" aria-labelledby="step4">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-12 col-md-3 col-form-label text-md-right" for="specialization_id">{{ $t('sentence.specialization') }} <span class="text-danger font-weight-bolder">*</span></label>
                        <div class="col-12 col-md-9">
                            <select data-live-search="true" class="form-control" name="specialization_id" v-model="formInputs.specialization_id" id="specialization_id">
                                <option selected>{{ $t('sentence.choose') }}</option>
                                <option v-for="specialization in specializations" :key="specializations.id">
                                    {{ specialization.name }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-md-3 col-form-label text-md-right" for="galleries">{{ $t('sentence.upload-image') }} <span class="text-danger font-weight-bolder">*</span></label>
                        <div class="col-12 col-md-9">
                            <input type="file" class="form-control" name="galleries[]" @change="onFileChange" multiple/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tags" class="col-12 col-md-3 col-form-label text-md-right warning">
                            {{ $t('sentence.tags') }} <span class="badge blue-tooltip" data-toggle="tooltip" :title="$t('sentence.tags-info')">!</span>
                        </label>
                        <div class="col-12 col-md-9">
                            <input type="text" name="tags[]" v-model="formInputs.tag" id="tags" data-role="tagsinput" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="min_salary" class="col-12 col-md-3 col-form-label text-md-right">{{ $t('sentence.min_salary') }} <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-12 col-md-9">
                            <input min="0"
                            id="min_salary" type="number" 
                            class="form-control" name="min_salary" v-model="formInputs.min_salary" autocomplete="min_salary" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="max_salary" class="col-12 col-md-3 col-form-label text-md-right">{{ $t('sentence.max_salary') }} <span class="text-danger font-weight-bolder">*</span></label>

                        <div class="col-12 col-md-9">
                            <input min="0"
                            id="max_salary" type="number" 
                            class="form-control" name="max_salary" v-model="formInputs.max_salary" autocomplete="max_salary" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-md-3 col-form-label text-md-right" for="currency_id">{{ $t('sentence.currency') }} <span class="text-danger font-weight-bolder">*</span></label>
                        <div class="col-12 col-md-9">
                            <select data-live-search="true" class="form-control" v-model="formInputs.currency_id" id="currency_id">
                                <option selected>{{ $t('sentence.choose') }}</option>
                                <option v-for="currency in currencies" :key="currency.id">
                                    {{ currency.symbol }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-md-3 col-form-label text-md-right" for="settlement_id">{{ $t('sentence.work-category') }} <span class="text-danger font-weight-bolder">*</span></label>
                        <div class="col-12 col-md-9">
                            <select data-live-search="true" class="form-control" v-model="formInputs.settlement_id" name="settlement_id" id="settlement_id">
                                <option selected>{{ $t('sentence.choose') }}</option>
                                <option v-for="settlement in settlements" :key="settlement.id">
                                    {{ settlement.name }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input name="negotiable" type="hidden" value="0">
                                <input class="form-check-input" 
                                    type="checkbox" name="negotiable" id="negotiable" value="1">
                                <label class="form-check-label" for="negotiable">
                                    {{ $t('sentence.salary_negotiable') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" 
                                    type="checkbox" name="term1" id="term1" v-model="formInputs.term1">
                                <label class="form-check-label" for="term1">
                                    {{ $t('sentence.accept') }} <a href="/regulamin" class="text-lowercase">{{ $t('sentence.regulation') }}</a> EmployMed.eu
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" 
                                    type="checkbox" name="term2" id="term2" v-model="formInputs.term2">
                                <label class="form-check-label" for="term2">
                                    {{ $t('sentence.accept') }} <a href="/polityka-cookies" class="text-lowercase">{{ $t('sentence.cookies-policy') }}</a> EmployMed.eu
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" 
                                    type="checkbox" name="term3" id="term3" v-model="formInputs.term3">
                                <label class="form-check-label" for="term3">
                                    {{ $t('sentence.data-conversion') }} EmployMed.eu
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                {{ $t('sentence.register') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        data: function() {
            return {
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
                    location_id: '',
                    state_id: '',
                    postCode: '',
                    street: '',
                    phone: '',
                    specialization_id: '',
                    galleries: [],
                    tags: [],
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
            'states',
            'locations',
            'specializations',
            'currencies',
            'settlements'
        ],
        mounted() {
            console.log('asdasd')
        },
        methods: {
            onFileChange(event) {
                this.formInputs.galleries = event.target.files || event.data$tfer.files;
            },
        }
    }
</script>
