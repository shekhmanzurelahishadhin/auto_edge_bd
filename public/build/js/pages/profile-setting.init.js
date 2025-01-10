/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Profile-setting init js
*/

// Profile Foreground Img
if (document.querySelector("#profile-foreground-img-file-input")) {
    document.querySelector("#profile-foreground-img-file-input").addEventListener("change", function () {
        var preview = document.querySelector(".profile-wid-img");
        var file = document.querySelector(".profile-foreground-img-file-input")
            .files[0];
        var reader = new FileReader();
        reader.addEventListener(
            "load",
            function () {
                preview.src = reader.result;
            },
            false
        );
        if (file) {
            reader.readAsDataURL(file);
        }
    });
}

// Profile Foreground Img
if (document.querySelector("#profile-img-file-input")) {
    document.querySelector("#profile-img-file-input").addEventListener("change", function () {
        var preview = document.querySelector(".user-profile-image");
        var file = document.querySelector(".profile-img-file-input").files[0];
        var reader = new FileReader();
        reader.addEventListener(
            "load",
            function () {
                preview.src = reader.result;
            },
            false
        );
        if (file) {
            reader.readAsDataURL(file);
        }
    });
}


var count = 2;
var eduCount = 2;
var awaCount = 2;
var attCount = 2;

// var genericExamples = document.querySelectorAll("[data-trigger]");
// for (i = 0; i < genericExamples.length; ++i) {
//     var element = genericExamples[i];
//     new Choices(element, {
//         placeholderValue: "This is a placeholder set in the config",
//         searchPlaceholderValue: "This is a search placeholder",
//         searchEnabled: false,
//     });
// }

function new_link() {
    count++;
    var div1 = document.createElement('div');
    div1.id = count;

    var delLink = '<div class="row">\n' +
        '                                            <div class="col-lg-8">\n' +
        '                                                <div class="mb-3">\n' +
        '                                                    <label for="position" class="form-label">Job Position <strong class="text-danger">*</strong></label>\n' +
        '                                                    <input type="text" required name="position[]" class="form-control" id="position" placeholder="Job position">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '<div class="col-lg-4">\n' +
        '<div class="mb-3">\n' +
        '<label for="type" class="form-label">Type <strong class="text-danger">*</strong></label>\n' +
        '<select class="form-control"  name="type[]" id="type">\n' +
        '<option value="Regular">Regular</option>\n' +
        '<option value="Additional">Additional</option>\n' +
        '</select>\n' +
        '</div>\n' +
        '</div>\n' +
        '                                            <!--end col-->\n' +
        '                                            <div class="col-lg-6">\n' +
        '                                                <div class="mb-3">\n' +
        '                                                    <label for="organization" class="form-label">Organization Name <strong class="text-danger">*</strong></label>\n' +
        '                                                    <input type="text" required name="organization[]" class="form-control" id="organization" placeholder="organization name">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <!--end col-->\n' +
        '                                            <div class="col-lg-6">\n' +
        '                                                <div class="mb-3">\n' +
        '                                                    <label for="experienceYear" class="form-label">Experience\n' +
        '                                                        Years <strong class="text-danger">*</strong></label>\n' +
        '                                                    <div class="row">\n' +
        '                                                        <div class="col-lg-5">\n' +
        '                                                            <input required type="text" name="from_date[]" class="form-control flatpickr" id="from_date" placeholder="From date">\n' +
        '                                                        </div>\n' +
        '                                                        <!--end col-->\n' +
        '                                                        <div class="col-auto align-self-center">\n' +
        '                                                            to\n' +
        '                                                        </div>\n' +
        '                                                        <!--end col-->\n' +
        '                                                        <div class="col-lg-5">\n' +
        '                                                            <input type="text" name="to_date[]" class="form-control flatpickr" id="to_date" placeholder="To date">\n' +
        '                                                        </div>\n' +
        '                                                        <!--end col-->\n' +
        '                                                    </div>\n' +
        '                                                    <!--end row-->\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <!--end col-->\n' +
        '                                            <div class="hstack gap-2 justify-content-end">\n' +
        '                                                <a class="btn btn-danger" href="javascript:deleteEl(' + count + ')"><i class="bx bx-trash-alt"></i> Delete</a>\n' +
        '                                            </div>\n' +
        '                                        </div>';

    div1.innerHTML = document.getElementById('expForm').innerHTML + delLink;

    document.getElementById('explink').appendChild(div1);

    $(".flatpickr").flatpickr({
        dateFormat: "Y-m-d", //change format also
    });

    var genericExamples = document.querySelectorAll("[data-trigger]");
    Array.from(genericExamples).forEach(function (genericExamp) {
        var element = genericExamp;
        new Choices(element, {
            placeholderValue: "This is a placeholder set in the config",
            searchPlaceholderValue: "This is a search placeholder",
            searchEnabled: false,
        });
    });
}

function deleteEl(eleId) {
    d = document;
    var ele = d.getElementById(eleId);
    var parentEle = d.getElementById('explink');
    parentEle.removeChild(ele);
}



function edu_link() {
    eduCount++;
    var div1 = document.createElement('div');
    div1.id = eduCount;

    var delLink = '<div class="row">\n' +
        '                                            <div class="col-lg-12">\n' +
        '                                                <div class="mb-3">\n' +
        '                                                    <label for="degree" class="form-label">Degree <strong class="text-danger">*</strong></label>\n' +
        '                                                    <input type="text" required name="degree[]" class="form-control" id="degree" placeholder="Degree">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <!--end col-->\n' +
        '                                            <div class="col-lg-6">\n' +
        '                                                <div class="mb-3">\n' +
        '                                                    <label for="group_subject" class="form-label">Group or Subject <strong class="text-danger">*</strong></label>\n' +
        '                                                    <input type="text" required name="group_subject[]" class="form-control" id="group_subject" placeholder="Group or Subject">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <!--end col-->\n' +
        '                                            <div class="col-lg-6">\n' +
        '                                                <div class="mb-3">\n' +
        '                                                    <label for="institute" class="form-label">Institute <strong class="text-danger">*</strong></label>\n' +
        '                                                    <input type="text" required name="institute[]" class="form-control" id="institute" placeholder="Institute name">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <!--end col-->\n' +
        '                                            <div class="col-lg-6">\n' +
        '                                                <div class="mb-3">\n' +
        '                                                    <label for="country" class="form-label">Country </label>\n' +
        '                                                    <input type="text" name="country[]" class="form-control" id="country" placeholder="Country">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <!--end col-->\n' +
        '                                            <div class="col-lg-6">\n' +
        '                                                <div class="mb-3">\n' +
        '                                                    <label for="passing_year" class="form-label">Passing year <strong class="text-danger">*</strong></label>\n' +
        '                                                    <input type="number" required name="passing_year[]" class="form-control" id="passing_year" placeholder="Passing year">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <!--end col-->\n' +
        '\n' +
        '                                            <div class="hstack gap-2 justify-content-end">\n' +
        '                                                <a class="btn btn-danger" href="javascript:deleteEdu('+ eduCount +')"><i class="bx bx-trash-alt"></i> Delete</a>\n' +
        '                                            </div>\n' +
        '                                        </div>';

    div1.innerHTML = document.getElementById('eduForm').innerHTML + delLink;

    document.getElementById('edulink').appendChild(div1);

    var genericExamples = document.querySelectorAll("[data-trigger]");
    Array.from(genericExamples).forEach(function (genericExamp) {
        var element = genericExamp;
        new Choices(element, {
            placeholderValue: "This is a placeholder set in the config",
            searchPlaceholderValue: "This is a search placeholder",
            searchEnabled: false,
        });
    });
}

function deleteEdu(eleId) {
    d = document;
    var ele = d.getElementById(eleId);
    var parentEle = d.getElementById('edulink');
    parentEle.removeChild(ele);
}



function awa_link() {
    awaCount++;
    var div1 = document.createElement('div');
    div1.id = awaCount;

    var delLink = '<div class="row">\n' +
        '                                            <div class="col-lg-8">\n' +
        '                                                <div class="mb-3">\n' +
        '                                                    <label for="title" class="form-label">Award title <strong class="text-danger">*</strong></label>\n' +
        '                                                    <input type="text" required name="title[]" class="form-control" id="title" placeholder="Award title">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <!--end col-->\n' +
        '                                            <div class="col-lg-4">\n' +
        '                                                <div class="mb-3">\n' +
        '                                                    <label for="type" class="form-label">Award Type </label>\n' +
        '                                                    <input type="text" name="type[]" class="form-control" id="type" placeholder="e.g Lifetime">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <!--end col-->\n' +
        '                                            <div class="col-lg-6">\n' +
        '                                                <div class="mb-3">\n' +
        '                                                    <label for="country" class="form-label">Country </label>\n' +
        '                                                    <input type="text" name="country[]" class="form-control" id="country" placeholder="Country">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <!--end col-->\n' +
        '                                            <div class="col-lg-6">\n' +
        '                                                <div class="mb-3">\n' +
        '                                                    <label for="year" class="form-label">Year <strong class="text-danger">*</strong></label>\n' +
        '                                                    <input type="number" required name="year[]" class="form-control" id="year" placeholder="Year">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <!--end col-->\n' +
        '                                            <div class="col-lg-12">\n' +
        '                                                <div class="mb-3 pb-2">\n' +
        '                                                    <label for="description"\n' +
        '                                                           class="form-label">Description <strong class="text-danger">*</strong></label>\n' +
        '                                                    <textarea name="description[]" required class="form-control"\n' +
        '                                                              id="description" placeholder="Enter your description" rows="5"></textarea>\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <!--end col-->\n' +
        '                                            <!--end col-->\n' +
        '                                            <div class="hstack gap-2 justify-content-end">\n' +
        '                                                <a class="btn btn-danger" href="javascript:deleteAwa('+ awaCount +')"><i class="bx bx-trash-alt"></i> Delete</a>\n' +
        '                                            </div>\n' +
        '                                        </div>';

    div1.innerHTML = document.getElementById('awaForm').innerHTML + delLink;

    document.getElementById('awalink').appendChild(div1);

    var genericExamples = document.querySelectorAll("[data-trigger]");
    Array.from(genericExamples).forEach(function (genericExamp) {
        var element = genericExamp;
        new Choices(element, {
            placeholderValue: "This is a placeholder set in the config",
            searchPlaceholderValue: "This is a search placeholder",
            searchEnabled: false,
        });
    });
}

function deleteAwa(eleId) {
    d = document;
    var ele = d.getElementById(eleId);
    var parentEle = d.getElementById('awalink');
    parentEle.removeChild(ele);
}

function att_link() {
    attCount++;
    var div1 = document.createElement('div');
    div1.id = attCount;

    var delLink = '<div class="row">\n' +
        '                <div class="col-lg-12">\n' +
        '                    <div class="mb-3">\n' +
        '                        <label for="title" class="form-label">Title <strong class="text-danger">*</strong></label>\n' +
        '                        <input type="text" required name="title[]" class="form-control" id="title" placeholder="Resource title">\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '                <!--end col-->\n' +
        '                <div class="col-lg-12">\n' +
        '                    <div class="mb-3">\n' +
        '                        <label for="attachment" class="form-label">Attachment File <strong class="text-danger">*</strong></label>\n' +
        '                        <input type="file" required name="attachment[]" class="form-control" id="attachment" placeholder="Attachment File">\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '                <!--end col-->\n' +
        '                <div class="hstack gap-2 justify-content-end">\n' +
        '                    <a class="btn btn-danger" href="javascript:deleteAtt(' + attCount + ')"><i class="bx bx-trash-alt"></i> Delete</a>\n' +
        '                </div>\n' +
        '            </div>';

    div1.innerHTML = document.getElementById('attForm').innerHTML + delLink;

    document.getElementById('attlink').appendChild(div1);

    var genericExamples = document.querySelectorAll("[data-trigger]");
    Array.from(genericExamples).forEach(function (genericExamp) {
        var element = genericExamp;
        new Choices(element, {
            placeholderValue: "This is a placeholder set in the config",
            searchPlaceholderValue: "This is a search placeholder",
            searchEnabled: false,
        });
    });
}

function deleteAtt(eleId) {
    d = document;
    var ele = d.getElementById(eleId);
    var parentEle = d.getElementById('attlink');
    parentEle.removeChild(ele);
}
