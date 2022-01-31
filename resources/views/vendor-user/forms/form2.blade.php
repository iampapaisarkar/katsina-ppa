<div id="directors-info-vertical-modern" class="content" role="tabpanel" aria-labelledby="directors-info-vertical-modern-trigger">
                                <div class="content-header">
                                    <h5 class="mb-0">Director's Info</h5>
                                    <small>Enter Director's Info.</small>
                                </div>
                                
                                <div data-repeater-list="invoice">
                                            <div data-repeater-item>
                                                <div class="row d-flex align-items-end">
                                                    
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="fname">First Name</label>
                                                            <input type="text" class="form-control" id="fname" aria-describedby="fname" placeholder="Director's Firstname" />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="lname">Last Name</label>
                                                            <input type="text" class="form-control" id="lname" aria-describedby="lname" placeholder="Director's Lastname" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="email-id-column">Email</label>
                                                            <input type="email" id="email-id-column" class="form-control" name="email-id-column" placeholder="Email" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                    	<div class="mb-1">
                                                        <label class="form-label" for="phone-number2">Phone Number</label>
                                                        <input type="text" class="form-control phone-number-mask" placeholder="08021234567" id="phone-number2" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-1 col-md-4 col-12">
                                                        <label class="form-label" for="vertical-modern-address">Address</label>
                                                        <input type="text" id="vertical-modern-address" class="form-control" placeholder="98 Ibrahim Ado bridge Road, " />
                                                    </div>
                                                    
                                                    <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">
                                                        <label for="formFile" class="form-label">Upload Passport Photo (IAMGE/1MB max)</label>
                                                        <input class="form-control" type="file" id="formFile" accept="image/png, image/jpeg, " />
                                                    </div>
                                                    <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">
                                                        <label for="formFile" class="form-label">Upload Identification (PDF/2MB max)</label>
                                                        <input class="form-control" type="file" id="formFile" accept="application/pdf" />
                                                    </div>
                                                    <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">
                                                        <label for="formFile" class="form-label">Upload Certificates (PDF/2MB max)</label>
                                                        <input class="form-control" type="file" id="formFile" accept="application/pdf"  />
                                                    </div>
                                                   

                                                    <div class="col-md-12 col-12 mb-50">
                                                        <div class="mb-1">
                                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                                <i data-feather="x" class="me-25"></i>
                                                                <span>Delete</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                    <i data-feather="plus" class="me-25"></i>
                                                    <span>Add New</span>
                                                </button>
                                            </div>
                                        </div>
                                
                                
                                
                                
                                
                                <!--<div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-first-name">First Name</label>
                                        <input type="text" id="vertical-modern-first-name" class="form-control" placeholder="John" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-last-name">Last Name</label>
                                        <input type="text" id="vertical-modern-last-name" class="form-control" placeholder="Doe" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-country">Country</label>
                                        <select class="select2 w-100" id="vertical-modern-country">
                                            <option label=" "></option>
                                            <option>UK</option>
                                            <option>USA</option>
                                            <option>Spain</option>
                                            <option>France</option>
                                            <option>Italy</option>
                                            <option>Australia</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-language">Language</label>
                                        <select class="select2 w-100" id="vertical-modern-language" multiple>
                                            <option>English</option>
                                            <option>French</option>
                                            <option>Spanish</option>
                                        </select>
                                    </div>
                                </div>-->
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>