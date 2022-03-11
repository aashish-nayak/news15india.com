@extends('layouts.backpanel.master')
@section('title', 'Category')
@push('plugin-css')
    <link href="{{ asset('assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
@endpush
@push('css')
    <style>
        .bootstrap-tagsinput .badge {
            margin: 2px 4px;
            padding: 5px 8px;
            font-size: 75%;
            font-weight: 700;
        }

        .bootstrap-tagsinput .badge [data-role="remove"] {
            margin-left: 5px;
            cursor: pointer;
        }

        .img-box {
            background: #fff;
            border: 3px dashed #e8e8e8;
            color: #aaa;
            cursor: pointer;
            display: block;
            font-size: 22px;
            padding: 40px 0 26px;
            position: relative;
            text-align: center;
        }

        .img-box button {
            font-size: 14px;
            color: #555555;
            background: #cccccc;
        }

        .img-box span {
            font-size: 10px;
        }

    </style>
@endpush
@section('sections')
    <div class="row">
        <div class="col-md-4">
            <h6 class="mb-0 text-uppercase">Add Category</h6>
            <hr>
            <div class="card radius-10">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-danger" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#dangerhome" role="tab"
                                aria-selected="true">
                                <div class="tab-title">Basic</div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#dangerprofile" role="tab"
                                aria-selected="false">
                                <div class="tab-title">Image</div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#dangercontact" role="tab"
                                aria-selected="false">
                                <div class="tab-title">SEO</div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content py-3">
                        <div class="tab-pane fade active show" id="dangerhome" role="tabpanel">
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label"><b>Category Name</b></label>
                                <input class="form-control form-control-sm" type="text" value="" id="example-text-input">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input2" class="col-form-label"><b>Slug</b></label>
                                <input class="form-control form-control-sm" type="text" value="" id="example-text-input2">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input2" class="col-form-label"><b>Parent Category</b></label>
                                <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                    <option selected="">Select Parent Category</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="" class="col-form-label d-block"><b>Status</b></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="inlineRadioOptions"
                                            id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="example-text-input3" class="col-form-label"><b>Order</b></label>
                                    <input class="form-control form-control-sm" type="number" value=""
                                        id="example-text-input3">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dangerprofile" role="tabpanel">
                            <input type="file" class="" hidden="" name="" id="cat-img">
                            <label for="cat-img" class="img-box">
                                <div class="col-12">Pick a Image</div>
                                <div class="col-12"><span>OR</span></div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-secondary px-5"><i class="bx bx-link mr-1"></i>Get
                                        from URL</button>
                                </div>
                            </label>
                        </div>
                        <div class="tab-pane fade" id="dangercontact" role="tabpanel">
                            <div class="form-group">
                                <label for="example-text-input2" class="col-form-label"><b>SEO Title</b></label>
                                <input class="form-control form-control-sm" type="text" value="" id="example-text-input2">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label"><b>Meta Keywords</b></label>
                                <input type="text" class="form-control form-control-sm" placeholder="comma separated (,)"
                                    data-role="tagsinput" value="">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input2" class="col-form-label"><b>Meta Description</b></label>
                                <textarea class="form-control form-control-sm" id="inputAddress" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary px-3">Submit</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h6 class="mb-0 text-uppercase">All Categories</h6>
            <hr>
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="categories" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Slug</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009/01/12</td>
                                    <td>$86,000</td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2012/03/29</td>
                                    <td>$433,060</td>
                                </tr>
                                <tr>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>33</td>
                                    <td>2008/11/28</td>
                                    <td>$162,700</td>
                                </tr>
                                <tr>
                                    <td>Brielle Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td>New York</td>
                                    <td>61</td>
                                    <td>2012/12/02</td>
                                    <td>$372,000</td>
                                </tr>
                                <tr>
                                    <td>Herrod Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td>San Francisco</td>
                                    <td>59</td>
                                    <td>2012/08/06</td>
                                    <td>$137,500</td>
                                </tr>
                                <tr>
                                    <td>Rhona Davidson</td>
                                    <td>Integration Specialist</td>
                                    <td>Tokyo</td>
                                    <td>55</td>
                                    <td>2010/10/14</td>
                                    <td>$327,900</td>
                                </tr>
                                <tr>
                                    <td>Colleen Hurst</td>
                                    <td>Javascript Developer</td>
                                    <td>San Francisco</td>
                                    <td>39</td>
                                    <td>2009/09/15</td>
                                    <td>$205,500</td>
                                </tr>
                                <tr>
                                    <td>Sonya Frost</td>
                                    <td>Software Engineer</td>
                                    <td>Edinburgh</td>
                                    <td>23</td>
                                    <td>2008/12/13</td>
                                    <td>$103,600</td>
                                </tr>
                                <tr>
                                    <td>Jena Gaines</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>30</td>
                                    <td>2008/12/19</td>
                                    <td>$90,560</td>
                                </tr>
                                <tr>
                                    <td>Quinn Flynn</td>
                                    <td>Support Lead</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2013/03/03</td>
                                    <td>$342,000</td>
                                </tr>
                                <tr>
                                    <td>Charde Marshall</td>
                                    <td>Regional Director</td>
                                    <td>San Francisco</td>
                                    <td>36</td>
                                    <td>2008/10/16</td>
                                    <td>$470,600</td>
                                </tr>
                                <tr>
                                    <td>Haley Kennedy</td>
                                    <td>Senior Marketing Designer</td>
                                    <td>London</td>
                                    <td>43</td>
                                    <td>2012/12/18</td>
                                    <td>$313,500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/plugins/input-tags/js/tagsinput.js') }}"></script>
    <script>
        $(document).ready(function() {            
            $('#categories').DataTable({
             processing: true,
             serverSide: true,
            //  ajax: "",
            //  columns: [
            //     { data: 'id' },
            //     { data: 'name' },
            //     { data: 'email' },
            //  ]
          });
        });
    </script>
@endpush
