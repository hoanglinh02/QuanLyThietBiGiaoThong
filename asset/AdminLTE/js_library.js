// Parse chuỗi json -> object json
function JSON_PARSE(json_string) {
    return $.parseJSON(JSON.stringify(json_string));
}
// Hiển thị thông báo
function NOTYFY(msg, code) {
    var style;
    if (parseInt(code) < 0)
        style = 'error';
    else if (parseInt(code) == 0)
        style = 'success';
    else
        style = 'warn';

    $('.notifyjs-wrapper').remove();
    $.notify(msg, {
        className: style,
        position: 'bottom right'
    });
}
// Làm mới form
function FORM_INPUT_REFRESH() {
    $("#form_input")[0].reset();
}
// Lấy mảng dữ liệu là ID từ checkbox được chọn
function TABLE_CHECKED_GETID(table_id) {
    var a_id = [];
    var i = 0;
    $(table_id).find('input[type="checkbox"]:checked').each(function() {
        if ($(this).is(':checked')) {
            i++;
            a_id.push($(this).data('value'));
        }
    });
    if (i > 0) return a_id;
    return null;
}

/**
 * Lấy danh sách rowData đang được checked
 * @param {any} table DataTable
 */
function TABLE_CHECKED_GET_OBJECT_CHECKED(table) {
    return JSON.stringify(TABLE_CHECKED_GET_OBJECT_CHECKED_ROW(table));
}
/**
 * lấy thông tin
 * */
function TABLE_CHECKED_GET_OBJECT_CHECKED_ROW(table) {
    var a_object = [];
    table.rows().every(function(index) {
        if (table.rows(index).nodes().to$().find('input[type="checkbox"]').is(':checked')) {
            a_object.push(table.rows(index).data()[0]);
        }
    });
    return a_object;
}
// DATATABLE
function DATATABLE_GET_ID_CHECKED(table, key) {
    var a_id = [];
    var i = 0;
    table.rows().every(function(index) {
        if (table.rows(index).nodes().to$().find('input[type="checkbox"]').is(':checked')) {
            i++;
            a_id.push(table.rows(index).data()[0][key]);
        }
    });
    if (i > 0) return a_id;
    return null;
}

function TABLE_CHECKED_GET_OBJECT(table) {
    var a_object = [];
    table.rows().every(function(index) {
        a_object.push(table.rows(index).data()[0]);
    });
    return JSON.stringify(a_object);
}
// Lấy mảng dữ liệu từ form nhập
function GET_INPUT_DATA_BYID(form_id) {

    var a_input = $(form_id).serializeObject();
    for (var i in a_input) {
        try {
            if (a_input[i].replace(/ /gi, '') != '' || a_input[i] != null) {
                a_input[i] = a_input[i].trim();
                a_input[i] = a_input[i].replace(/\s\s+/g, ' ');
                a_input[i] = a_input[i].replace(/  /gi, ' ');
            }
            if ($(GET_ID_BYNAME(i)).prop('multiple') == false) {
                if (a_input[i].replace(/ /gi, '') != '' || a_input[i] != null) {
                    a_input[i] = a_input[i].trim();
                    a_input[i] = a_input[i].replace(/\s\s+/g, ' ');
                }
            }
        } catch (e) {}
    }
    return a_input;
}
// Lấy mảng dữ liệu từ form nhập
function GET_INPUT_DATA(form_input) {
    if (!form_input) form_input = '#form_input';
    var a_input = $(form_input).serializeObject();
    for (var i in a_input) {

        if (typeof(a_input[i]) === 'string' && (a_input[i].replace(/ /gi, '') != '' || a_input[i] != null)) {
            a_input[i] = a_input[i].trim();
            a_input[i] = a_input[i].replace(/\s\s+/g, ' ');
            a_input[i] = a_input[i].replace(/  /gi, ' ');
        }
    }
    return a_input;
}
// Lấy mảng dữ liệu từ form nhập cùng với thông tin session
function GET_OPOST(a_session, a_input, a_detail, a_id, b_gettype, a_detail2) {
    if (a_session == undefined) a_session = null;
    if (a_input == undefined) a_input = null;
    if (a_detail == undefined) a_detail = null;
    if (a_id == undefined) a_id = null;
    if (b_gettype == undefined) b_gettype = null;
    if (a_detail2 == undefined) a_detail2 = null;
    return { a_session: JSON.stringify(JSON.parse(a_session)), a_input: JSON.stringify(a_input), a_detail: JSON.stringify(a_detail), a_id: JSON.stringify(a_id), b_gettype: b_gettype, a_detail2: JSON.stringify(a_detail2) };
}

function GET_OPOST_ThanhToanThe(a_session, a_input, a_detail, a_id, b_gettype, a_thanhtoanthe, a_detail2) {
    ////
    if (a_session == undefined) a_session = null;
    if (a_input == undefined) a_input = null;
    if (a_detail == undefined) a_detail = null;
    if (a_id == undefined) a_id = null;
    if (b_gettype == undefined) b_gettype = null;
    if (a_thanhtoanthe == undefined) a_thanhtoanthe = null;
    if (a_detail2 == undefined) a_detail2 = null;

    return { a_session: JSON.stringify(JSON.parse(a_session)), a_input: JSON.stringify(a_input), a_detail: JSON.stringify(a_detail), a_id: JSON.stringify(a_id), b_gettype: b_gettype, a_thanhtoanthe: JSON.stringify(a_thanhtoanthe), a_detail2: JSON.stringify(a_detail2) };
}

function GET_OPOST_ADV(user_id, a_input, a_detail, a_id) {
    return { userid: user_id, a_input: JSON.stringify(a_input), a_detail: JSON.stringify(a_detail), a_id: JSON.stringify(a_id) };
}

function FORM_FILL(form_id, data) {
    $(form_id).autofill(data, { findbyname: true });
}
// Lấy tên từ name
function GET_ID_BYNAME(element_name) {
    var b_selector = $('#' + element_name)[0] ? $('#' + element_name)[0].tagName.toLowerCase() : null;
    switch (b_selector) {
        case 'input':
            return "input[name='" + element_name + "']";
            break;
        case 'textarea':
            return "textarea[name='" + element_name + "']";
            break;
        case 'select':
            return "input[name='" + element_name + "']";
            break;
    }
}
// Lấy tên từ id
function GET_ID_BYID(element_id) {
    return "#lbl_" + element_id;
}
// Hiển thị nội dung lỗi validate
function PRINT_ERROR_MSG(element_id, msg) {
    $('#lbl_' + element_id).text('Vui lòng nhập ' + msg);
    $('#lbl_' + element_id).removeAttr('hidden');
}
// REGEX TOOLS
function REGEX_VALID(element_id, value, type, regex, msg) {
    var b_dem = 0;
    if ($(GET_ID_BYNAME(element_id)).data(type) == true) {
        if (value.trim() != '') {
            var regex = regex;
            if (regex.test(value) == false) {
                b_dem++;
                $('#lbl_' + element_id).text(msg);
                $('#lbl_' + element_id).removeAttr('hidden');
            } else {
                $('#lbl_' + element_id).attr('hidden', 'hidden');
            }
        } else {
            $('#lbl_' + element_id).attr('hidden', 'hidden');
        }
    }
    return b_dem;
}
// Validate
function VALIDATE(a_input, form) {
    ////
    var b_dem = 0;
    var b_checknull = false;
    var b_alias_error = '';
    for (var i in a_input) {
        var element = form != undefined ? $(form).find(GET_ID_BYNAME(i)) : $(GET_ID_BYNAME(i));
        var b_batbuoc = element.data('batbuoc');
        if (b_batbuoc == true) {
            if (a_input[i].trim() == '' || a_input[i].replace(/ /gi, ' ') == '' || a_input[i].replace(/ /gi, '') == '' || a_input[i] == null || parseInt(a_input[i]) < 0) {
                b_dem++;
                if ($('#' + i)[0].tagName.toLowerCase() == 'input' || $('#' + i)[0].tagName.toLowerCase() == 'textarea') b_alias_error = 'Vui lòng nhập ';
                else if ($('#' + i)[0].tagName.toLowerCase() == 'select') b_alias_error = 'Vui lòng chọn ';
                $('#lbl_' + i).text(b_alias_error + element.data('msg'));
                $('#lbl_' + i).removeAttr('hidden');
            } else {
                if (element.data('percent') == true) {
                    var b_percent = parseInt(a_input[i]);
                    if (b_percent < 0 || b_percent > 100) {
                        b_dem++;
                        $('#lbl_' + i).text(element.data('name') + ' trong khoảng [0-100]%');
                        $('#lbl_' + i).removeAttr('hidden');
                    } else {
                        $('#lbl_' + i).attr('hidden', 'hidden');
                    }
                } else if (element.data('limit') == true) {
                    var b_number = parseInt(a_input[i]);
                    var b_min = element.min;
                    console.log(b_min);
                    if (b_number <= 9 && b_number > 0) {
                        b_dem++;
                        $('#lbl_' + i).text(element.data('name') + ' trong khoảng [0-9]');
                        $('#lbl_' + i).removeAttr('hidden');
                    } else {
                        $('#lbl_' + i).attr('hidden', 'hidden');
                    }
                } else if (element.data('int') == true) {
                    if (Number.isInteger(a_input[i]) == true) {
                        if (a_input[i] < 0) {
                            b_dem++;
                            $('#lbl_' + i).text(element.data('name') + ' phải lớn hơn 0');
                            $('#lbl_' + i).removeAttr('hidden');
                        } else {
                            $('#lbl_' + i).removeAttr('hidden');
                        }
                    } else {
                        b_dem++;
                    }
                } else $('#lbl_' + i).attr('hidden', 'hidden');
            }
        }
        b_dem += REGEX_VALID(i, a_input[i], 'email', /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/, 'Email không đúng định dạng');
        b_dem += REGEX_VALIDPhoneNumber(i, a_input[i], 'phone', /^[0-9]+(\.[0-9]{1,3})?$/, element.data('msg'));
        //if (b_batbuoc == true) b_dem += REGEX_VALID(i, a_input[i], 'special_characters', /[-\/\\^$*+?.()|[\]{}]/g, 'Không được chứa ký tự đặc biệt');
        //b_dem += REGEX_VALID(i, a_input[i], 'money', /^[1-9][0-9]+(\.[0-9]{1,3})?$/, 'Giá tiền không đúng định dạng');

        //if ($(GET_ID_BYNAME(i)).prop('multiple') == false) {
        //    if (a_input[i].replace(/ /gi, '') != '' || a_input[i] != null) { $(GET_ID_BYNAME(i)).val(a_input[i].trim()); }
        //    a_input[i] = a_input[i].replace(/\s\s+/g, ' ');
        //}
    }
    if (b_dem > 0) return false;
    return true;
}
/**
 * Validate riêng số điệnt hoại
 * @param {any} element_id
 * @param {any} value
 * @param {any} type
 * @param {any} regex
 * @param {any} msg
 */
function REGEX_VALIDPhoneNumber(element_id, value, type, regex, msg) {
    var b_dem = 0;
    if ($(GET_ID_BYNAME(element_id)).data(type) == true) {
        if (value.trim() != '') {
            value = value.replace('(+84)', '+84');
            if (value.trim().indexOf('+84') <= 0) {
                value = value.replace('(+84)', '0');
                value = value.replace('+84', '0');
                //value = value.replace('0084', '0');
                value = value.replace(/ /g, '');
            }

            if (value != '') {
                if (value.match(/^\d{10}/) || value.match(/^\d{11}/)) {
                    $('#lbl_' + element_id).attr('hidden', 'hidden');
                } else {
                    b_dem++;
                    $('#lbl_' + element_id).text(msg);
                    $('#lbl_' + element_id).removeAttr('hidden');
                }
            } else {
                $('#lbl_' + element_id).attr('hidden', 'hidden');
            }
        }
    }
    return b_dem;
}

function VALIDATE_GRID(a_detail) {

}
// Validate nghiệp vụ
function VALIDATE_BA(a_output) {
    for (var i in a_output) {
        $('#lbl_' + a_output[i].field).text(a_output[i].error);
        $('#lbl_' + a_output[i].field).removeAttr('hidden');
    }
}
// Gán giá trị cho textbox ẩn ở các combobox bắt buộc chọn khi onchange
function SET_VALUE_FORCOMBO_CHANGE(element_name, value) {
    $(GET_ID_BYNAME(element_name)).val(value);
}
// Lưu cache trình duyệt
function SAVE_CACHE(key, value) {
    localStorage.setItem(key, value);
}
// Xóa cache theo key
function REMOVE_CACHE(key) {
    localStorage.removeItem(key);
}
// Đọc cache lấy dữ liệu
function GET_CACHE(key) {
    try {
        return JSON.parse(localStorage.getItem(key));
    } catch (err) {
        return localStorage.getItem(key);
    }
}
// Kiểm tra tồn tại dữ liệu trong cache
function CHECK_CACHE(key) {
    if (localStorage.getItem(key) == '' || localStorage.getItem(key) == null)
        return false;
    return true;
}
// Thêm attr
function ADD_ATTR(element_id, attr, value) {
    $(element_id).removeAttr(attr);
    $(element_id).attr(attr, value);
}
// Xóa attr
function REMOVE_ATTR(element_id, attr) {
    $(element_id).removeAttr(attr);
}
// Set avatar mặc định
function IMG_DEFAULT(element_id) {
    $(element_id).removeAttr('src');
    $(element_id).attr('src', '/upload/avatar/user_male.png');
}
// Lấy thông tin session
function GET_SESSION() {
    var b_session_id = $('#tt_session').data('id');
    var b_session_acc = $('#tt_session').data('acc');
    var json = '{ "userid": ' + b_session_id + ',  "account": "' + b_session_acc + '" }';
    return JSON.parse(JSON.stringify(json));
}
// Convert kiểu ngày dd/mm/yyyy -> yyyy-mm-dd (date)
function TO_ISODATE(input_date) {
    var date = moment(input_date, 'DD/MM/YYYY HH:mm').toDate();
    var b_year = date.getFullYear();
    var b_month = date.getMonth() + 1;
    var b_day = date.getDate();
    var result = b_year + '-' + b_month + '-' + b_day;
    return new Date(result);
}
// Default current date
function DEFAULT_DATE(element_id, format) {
    $(element_id).datetimepicker({ format: format, defaultDate: new Date() });
}

function DEFAULT_DATE_CONFIG(element_id, config) {
    $(element_id).datetimepicker(config);
}

function DEFAULT_NULLDATE(element_id, format) {
    $(element_id).datetimepicker({ format: format, defaultDate: null, });
}
// reset date
function RESET_DATE(arr_element_id, type) {
    var date = new Date();
    for (var i = 0; i < arr_element_id.length; i++) {
        $(arr_element_id[i]).val(FORMAT_DATE(date, 'DD/MM/YYYY HH:MM'));
    }
}
// Format date

// Set date
function SET_DATE(arr_element_id, date, type) {
    for (var i = 0; i < arr_element_id.length; i++) {
        $(arr_element_id[i]).val(FORMAT_DATE(date, type));
    }
}

function MOMENTJS_FORMAT_DATE(date, type) {
    return date.format(type);
}



//------------------------ HELPER
function SELECT2_SINGLE_BINDING(combobox_id, url) {
    var option = "";
    $.ajax({
        url: url,
        type: 'GET',
        success: function(respond) {
            option += "<option value='-1' data-phanloai='' data-soluongton=''></option>";
            $.each(respond, function(index, value) {
                if (value.status == true) {
                    option += "<option value=" + value.value + " data-phanloai=" + value.phanloai + " data-soluongton=" + value.soluongton + ">" + value.text + "</option>";
                } else {
                    option += "<option value=" + value.value + " data-phanloai=" + value.phanloai + " data-soluongton=" + value.soluongton + " disabled >" + value.text + "</option>";
                }
            });
            $(combobox_id).html(' <option disabled selected value></option>' + option);
            //$(combobox_id).select2({
            //    tags: true, delay: 300000, multiple: false, allowClear: true, closeOnSelect: true, tokenSeparators: [';'], minimumInputLength: 1, minimumResultsForSearch: 10, width: '100%'
            //});
            $(combobox_id).select2();

        }
    })
}

function SELECT2_SINGLE2_BINDING(combobox_id, url) {
    var option = "";
    $.ajax({
        url: url,
        type: 'GET',
        success: function(respond) {
            $.each(respond, function(index, value) {
                option += "<option value=" + value.value + " data-phanloai=" + value.phanloai + ">" + value.text + "</option>";
            })
            $(combobox_id).html(' <option disabled selected value></option>' + option);
            $(combobox_id).select2({
                tags: true,
                delay: 300000,
                multiple: false,
                allowClear: true,
                closeOnSelect: true,
                tokenSeparators: [';'],
                minimumInputLength: 1,
                minimumResultsForSearch: 10,
                width: '100%'
            });
            $(combobox_id).select2();
            //$(combobox_id).val($(combobox_id + "option eq(2)").val()).trigger("change");
            //console.log("abcd: " + $(combobox_id + "option eq(2)").val());
        }
    })
}

function SELECT_DISABLED_OPTION(combobox_id, value) {
    //var a = GET_ID_BYNAME(element_name);
    $(combobox_id + '> option').each(function() {
        if ($(this).val() == value) {
            $(this).prop('disabled', true);
        } else {
            $(this).prop('disabled', false);
        }
    });
}

function SELECT2_MULTI_BINDING(combobox_id, url) {
    var option = "";
    $.ajax({
        url: url,
        type: 'GET',
        success: function(respond) {
            $.each(respond, function(index, value) {
                option += "<option value=" + value.value + ">" + value.text + "</option>";
            })
            $(combobox_id).html(option);
            $(combobox_id).select2({
                tags: true,
                multiple: true,
                allowClear: true,
                closeOnSelect: true,
                tokenSeparators: [';'],
                minimumInputLength: 1,
                minimumResultsForSearch: 10,
                width: '100%',
                //data: data,
            });
            //$(combobox_id).select2();

        }
    });
}

function SELECT_BINDING(combobox_id, url) {
    var option = "";
    $.ajax({
        url: url,
        type: 'GET',
        success: function(respond) {
            option += "<option value=''></option>";
            $.each(respond, function(index, value) {
                if (value.status == true) {
                    option += "<option value=" + value.value + ">" + value.text + "</option>";
                } else {
                    option += "<option value=" + value.value + " disabled>" + value.text + "</option>";
                }

            })
            $(combobox_id).html(option);

        }
    })
}

function SELECT_BINDING_ADV(combobox_id, url) {
    $.ajax({
        type: 'GET',
        url: url,
        success: function(respond) {
            var html = "";
            $.each(respond, function(index, value) {
                html += '<option data-level=' + value.data_level + ' value=' + value.value + '>' + value.text + '</option>';
            });
            $(combobox_id).html(html);
        }
    })
}

function SELECT2_BINDING_ADV(combobox_id, url, callback, usedefault) {
    $.ajax({
        type: 'GET',
        url: url,
        success: function(respond) {
            var html = "";
            if (usedefault == true) {
                html += '<option value></option>';
            }
            $.each(respond, function(index, value) {
                html += '<option value=' + value.value + '>' + value.text + '</option>';
            });
            $(combobox_id).html(html);
            $(combobox_id).select2();
            SAVE_CACHE('DMDONVITINH', JSON.stringify(respond));
            if (callback) {
                callback();
            }
        }
    });
}
/**
 * bind combobox
 * @param {any} arr_combobox_id mang id combobox
 * @param {any} url ulr service
 * @param {any} typeFirstRow: -1 là add thêm row tất cả, 0 là add thêm 1 row trắng,
 */
function SELECT2_BINDING_ARRAY(arr_combobox_id, url, typeFirstRow, async) {
    if (async == undefined) {
        async = true;
    }
    $.ajax({
        type: 'GET',
        url: url,
        async: async,
        cache: true,
        success: function(respond) {
            if (respond && typeFirstRow == -1) {
                respond.unshift({ value: -1, text: "Tất cả" });
            } else if (respond && typeFirstRow == 0) {
                respond.unshift({ value: null, text: "" });
            }
            var html = [];
            if (respond != null) {
                for (var i = 0; i < respond.length; i++) {
                    if (respond[i].MaDanhMuc != undefined) {
                        html[i] = '<option ' + (respond[i]["DanhMucID"] ? ' value="' + respond[i]["DanhMucID"] + '" ' : '') + '>' + respond[i].TenDanhMuc + '</option>';
                    } else {
                        if (respond[i].disabled == true)
                            html[i] = '<option value=' + respond[i].value + ' disabled>' + respond[i].text + '</option>';
                        else
                            html[i] = '<option value=' + respond[i].value + '>' + respond[i].text + '</option>';
                    }
                }
            }
            for (var i = 0; i < arr_combobox_id.length; i++) {
                $(arr_combobox_id[i]).html(html.join(''));
                $(arr_combobox_id[i]).select2();
            }
            //SELECT2_TRIGGER_CHANGE(arr_combobox_id);
        }
    });
}

function SELECT2_BINDING_ARRAY_PLACEHOLDER(arr_combobox_id, url, typeFirstRow, placeHolder, async, defaultValue, callback) {
    if (async == undefined) {
        async = true;
    }
    $.ajax({
        type: 'GET',
        url: url,
        async: async,
        cache: true,
        success: function(respond) {
            if (respond && typeFirstRow == -1) {
                respond.unshift({ value: -1, text: "Tất cả" });
            } else if (respond && typeFirstRow == 0) {
                respond.unshift({ value: null, text: "" });
            }
            var html = [];
            if (respond != null) {
                for (var i = 0; i < respond.length; i++) {
                    if (respond[i].MaDanhMuc != undefined) {
                        html[i] = '<option ' + (respond[i]["DanhMucID"] ? ' value="' + respond[i]["DanhMucID"] + '" ' : '') + '>' + respond[i].TenDanhMuc + '</option>';
                    } else {
                        if (respond[i].disabled == true)
                            html[i] = '<option value=' + respond[i].value + ' disabled>' + respond[i].text + '</option>';
                        else
                            html[i] = '<option value=' + respond[i].value + '>' + respond[i].text + '</option>';
                    }
                }
            }
            for (var i = 0; i < arr_combobox_id.length; i++) {
                $(arr_combobox_id[i]).html(html.join(''));
                $(arr_combobox_id[i]).select2({
                    placeholder: placeHolder,
                    allowClear: true
                });
                if (defaultValue)
                    $(arr_combobox_id[i]).val(defaultValue).trigger("change");
            }
            if (callback && typeof(callback) === 'function') {
                callback();
            }
            //SELECT2_TRIGGER_CHANGE(arr_combobox_id);
        }
    });
}

function SELECT2_REMOTEDATA(combobox_id, url) {
    $(combobox_id).select2({
        ajax: {
            url: url,
            dataType: 'json',
            delay: 001,
            data: function(params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function(data, params) {
                //params.page = params.page || 1;
                var resultsArr = [];
                var disabled;
                $.each(data, function(index, value) {
                    if (value.status == true) {
                        disabled = false;
                    } else {
                        disabled = true;
                    }
                    resultsArr.push({
                        id: value.value,
                        text: value.text,
                        disabled: disabled,
                    });
                })

                return {
                    results: resultsArr,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        minimumInputLength: 1,
    });
}

function SELECT2_REMOTEDATA_SETVALUE(combobox_id, value, text) {
    if (value != null && value != "" && value != 0 && value != undefined) {
        html = "<option value=" + value + ">" + text + "</option>";
    } else {
        html = "<option></option>";
    }
    $(combobox_id).html(html);
    //$(combobox_id).select2('data', { id: value, text: text });

    //$(combobox_id).select2("trigger", "select", {
    //    data: { id: value }
    //});
}

function SELECT2_BINDING_FROM_CACHE(combobox_id, key) {
    var html = '';
    $.each(GET_CACHE(key), function(index, value) {
        html += '<option value=' + value.value + '>' + value.text + '</option>';
    });
    $(combobox_id).html(html);
    $(combobox_id).select2();
}

function CHOSEN_CONFIG(combobox_id) {
    $(combobox_id).chosen({
        placeholder_text_single: "",
        no_results_text: "Không có dữ liệu"
    });
}
//-----------MULTISELECT------------
function MULTI_SELECT_BINDING(combobox_id, url) {
    $.ajax({
        type: 'GET',
        url: url,
        success: function(respond) {
            var html = "";
            $.each(respond, function(index, value) {
                html += '<option data-level=' + value.data_level + ' value=' + value.value + '>' + value.text + '</option>';
            });
            $(combobox_id).html(html);
            $(combobox_id).multiselect({ enableFiltering: true, filterPlaceholder: 'Tìm kiếm', includeSelectAllOption: true, });
        }
    })
}

function COMBOBOX_GRID(element, url) {
    $.ajax({
        type: 'GET',
        url: url,
        success: function(respond) {
            var html = "";
            var b_max = respond.length;
            $.each(respond, function(index, value) {
                html += '<option value=' + value.value + '|' + value.text + '|' + value.MaDuoc + '>' + value.text + '</option>';
            });
            $(element).html(html);
            var b_first = 0;
            var b_result = '<table><thead><tr><td>id</td><td>name</td></tr><tbody>',
                b_a = '';
            $(element).select2({
                templateResult: function(event) {
                    b_first++;
                    if (b_first == 1) {

                    } else {
                        if (event.id != undefined) {
                            var a_item = event.id.split('|');
                            b_result = $(
                                '<tr>' +
                                '<td>' + a_item[0] + '</td>' +
                                '<td>' + a_item[1] + '</td>' +
                                '<td>' + a_item[2] + '</td>' +
                                '</div>'
                            );
                        }
                    }
                    if (b_first == b_max) {

                    }
                    b_a += b_result;
                    return b_result;
                },
                escapeMarkup: function(m) { return m; }
            });
        }
    });
}

function VALIDATE_DATETIME(a_input) {
    var b_dem = 0;
    for (var i in a_input) {
        if ($(GET_ID_BYNAME(i)).val() != null && $(GET_ID_BYNAME(i)).val().trim() != "") {
            if ($(GET_ID_BYNAME(i)).data('saungayhientai') == true) // ngày cần so sánh nằm sau ngày hiện tại
            {
                var b_saungayhientai = moment(a_input[i], 'DD/MM/YYYY');
                var b_current = moment();
                if (b_saungayhientai.isAfter(b_current) == true) {
                    $('#lbl_' + i).attr('hidden', 'hidden');
                    $('#lbl_' + i).text('');
                } else {
                    b_dem++;
                    $('#lbl_' + i).text('ngày nhập phải sau ngày hiện tại');
                    $('#lbl_' + i).removeAttr('hidden');

                }
            } else if ($(GET_ID_BYNAME(i)).data('truocngayhientai') == true) // ngày cần so sánh nằm trước ngày hiện tại
            {
                var b_truocngayhientai = moment(a_input[i], 'DD/MM/YYYY');
                var b_current = moment(moment(), 'DD/MM/YYYY');
                if (b_truocngayhientai.isBefore(b_current) == true) {
                    $('#lbl_' + i).attr('hidden', 'hidden');
                    $('#lbl_' + i).text('');
                } else {
                    b_dem++;
                    $('#lbl_' + i).text('ngày nhập phải trước ngày hiện tại');
                    $('#lbl_' + i).removeAttr('hidden');

                }
            } else if ($(GET_ID_BYNAME(i)).data('tungaydenngay') == true) // ngày cần so sánh nằm giữa 2 khoảng
            {
                var b_tungaydenngay = moment(a_input[i], 'DD/MM/YYYY');
                var b_ngaytu = $(GET_ID_BYNAME(i)).data('ngaytu');
                var b_ngayden = $(GET_ID_BYNAME(i)).data('ngayden');
                if (b_ngaytu != null && b_ngayden != null) {
                    var b_ngaytu_date = moment($(GET_ID_BYNAME(i)).data('ngaytu'), 'DD/MM/YYYY');
                    var b_ngayden_date = moment($(GET_ID_BYNAME(i)).data('ngayden'), 'DD/MM/YYYY');
                    if (b_tungaydenngay.isAfter(b_ngaytu) == true && b_tungaydenngay.isBefore(b_ngayden) == true) {

                        $('#lbl_' + i).attr('hidden', 'hidden');
                        $('#lbl_' + i).text('');
                    } else {
                        b_dem++;
                        $('#lbl_' + i).text('ngày nhập phải từ ngày ' + b_ngaytu_date.format('DD/MM/YYYY') + ' tới ngày ' + b_ngayden_date.format('DD/MM/YYYY'));
                        $('#lbl_' + i).removeAttr('hidden');
                    }
                } else if (b_ngaytu != null && b_ngayden == null) {
                    var b_ngaytu_date = moment($(GET_ID_BYNAME(i)).data('ngaytu'), 'DD/MM/YYYY');
                    if (b_tungaydenngay.isAfter(b_ngaytu_date) == true) {

                        $('#lbl_' + i).attr('hidden', 'hidden');
                        $('#lbl_' + i).text('');
                    } else {
                        b_dem++;
                        $('#lbl_' + i).text('ngày nhập phải sau ngày ' + b_ngaytu_date.format('DD/MM/YYYY'));
                        $('#lbl_' + i).removeAttr('hidden');
                    }
                } else if (b_ngaytu == null && b_ngayden != null) {
                    var b_ngayden_date = moment($(GET_ID_BYNAME(i)).data('ngayden'), 'DD/MM/YYYY');
                    if (b_tungaydenngay.isBefore(b_ngayden_date) == true) {

                        $('#lbl_' + i).attr('hidden', 'hidden');
                        $('#lbl_' + i).text('');
                    } else {
                        b_dem++;
                        $('#lbl_' + i).text('ngày nhập phải trước ngày ' + b_ngayden_date.format('DD/MM/YYYY'));
                        $('#lbl_' + i).removeAttr('hidden');
                    }
                } else {
                    $('#lbl_' + i).attr('hidden', 'hidden');
                }


            } else $('#lbl_' + i).attr('hidden', 'hidden');


        } else {
            $('#lbl_' + i).attr('hidden', 'hidden');
        }

    }

    if (b_dem > 0) return false;
    return true;
}


function FORMAT_TEXT(type) {
    switch (type) {
        case 'vnd_chan':
            return '0,0';
            break;
        case 'vnd_le':
            return '0,0.00';
            break;
    }
}
//function FORMAT_NUMBER(type) {
//    switch (type) {
//        case 'int': return '0'; break;
//        case 'float': return '0,0.0'; break;
//    }

//}

$(document).ready(function(e) {
    try {
        $('.ddl-select2').select2();
    } catch (e) {}
});

function DATERANGPICKER(element, config, callback) {
    $(element).daterangepicker(DATERANGEPICKER_CONFIG, callback);
}

jQuery.fn.extend({
    DataTableUpdate: function(source) {
        if ($.fn.dataTable.isDataTable($(this))) {
            $(this).DataTable().clear().draw();
            $(this).DataTable().rows.add(source).draw();
        }
    },
    getSelectItem: function() {
        if ($(this).length && $(this).find(' option:selected')) {
            var itemSelect = $(this).find(' option:selected').attr('data-item');
            if (itemSelect)
                return JSON.parse(itemSelect);
        }
        return {};
    },
    getDataSource: function() {
        var dataSource = [];
        if ($(this).length) {
            var length = $(this).find('option').length;
            for (var i = 0; i < length; i++) {
                item = $(this).find('option')[i];
                var itemData = item.getAttribute('data-item');
                if (itemData)
                    dataSource.push(JSON.parse(itemData));
            }

        }
        return dataSource;
    }
});

//jQuery.fn.extend({
//    serializeObject: function () {
//        var o = {};
//        var a = this.serializeArray();
//        $.each(a, function () {
//            if (o[this.name]) {
//                if (!o[this.name].push) {
//                    o[this.name] = [o[this.name]];
//                }
//                o[this.name].push(this.value || '');
//            } else {
//                o[this.name] = this.value || '';
//            }
//        });
//        return o;
//    }
//})

function confirmDialog(title, msg, confirmYes, confirmNo) {
    $.confirm({
        title: title ? title : "Xác nhận",
        content: msg ? msg : "Bạn có muốn xóa không?",
        confirm: function() {
            if (confirmYes && typeof(confirmYes) == "function")
                confirmYes();
        },
        cancel: function() {
            if (confirmNo && typeof(confirmNo) == "function")
                confirmNo();
        }
    });
}
/**
 * 
 * @param {any} combobox_id
 * @param {any} url
 */
function select2_bindingExtenCodeValue(combobox_id, url, typeFirstRow, defaultSelectValue, placeHolder) {

    $.ajax({
        url: url,
        type: 'GET',
        success: function(respond) {
            select2_bindingBySource(combobox_id, respond, typeFirstRow, defaultSelectValue, placeHolder);
        }
    })
}
/**
 * 
 * @param {any} arr_combobox_id
 * @param {any} url
 */
function select2_BindingArrayExtenCodeValue(arr_combobox_id, url, typeFirstRow, defaultSelectValue, firstSelect) {
    if (!firstSelect) firstSelect = false;
    $.ajax({
        url: url,
        type: 'GET',
        success: function(respond) {
            var option = "";
            if (respond && typeFirstRow == -1) {
                respond.unshift({ value: -1, text: "Tất cả" });
            } else if (respond && typeFirstRow == 0) {
                respond.unshift({ value: null, text: "" });
            }
            $.each(respond, function(index, value) {
                if (value.disabled) {
                    option += "<option disabled value='" + value.value + "' data-code=" + value.code + ">" + value.text + "</option>";
                } else { option += "<option value='" + value.value + "' data-code=" + value.code + ">" + value.text + "</option>"; }
            });
            for (var i = 0; i < arr_combobox_id.length; i++) {
                $(arr_combobox_id[i]).html(option);
                $(arr_combobox_id[i]).select2();

                if (defaultSelectValue) {
                    $(arr_combobox_id[i]).val(defaultSelectValue).trigger("change");
                } else if (firstSelect) {
                    $(arr_combobox_id[i]).val(respond[0].value).trigger("change");
                }
            }

        }
    })
}
/**
 * Tách từ select2_bindingExtenCodeValue để dùng cho trường hợp có source trước
 * @param {any} dataSource
 */
function select2_bindingBySource(combobox_id, respond, typeFirstRow, defaultSelectValue, placeHolder) {
    var option = "";
    if (typeFirstRow == -1) {
        option += "<option  value=" + -1 + " data-item='" + -1 + "' >Tất cả</option>";
    } else if (typeFirstRow == 0) {
        option += "<option  value=\"\" data-item=\"\" ></option>";
    }
    $.each(respond, function(index, value) {
        if (value.disabled) {
            option += "<option disabled value='" + value.value + "' data-code=" + value.code + ">" + value.text + "</option>";
        } else { option += "<option value='" + value.value + "' data-code=" + value.code + ">" + value.text + "</option>"; }
    });
    $(combobox_id).html(option);
    $(combobox_id).select2({ placeholder: placeHolder ? placeHolder : '', allowClear: true });

    $(combobox_id).val(defaultSelectValue).trigger("change");
}

/**
 * Tách từ select2_bindingExtenCodeValue để dùng cho trường hợp có source trước
 * @param {any} dataSource
 */
function select2FreeTextBindingBySource(combobox_id, respond, typeFirstRow, defaultSelectValue, placeHolder) {
    var option = "";
    if (typeFirstRow == -1) {
        option += "<option  value=" + -1 + " data-item='" + -1 + "' >Tất cả</option>";
    } else if (typeFirstRow == 0) {
        option += "<option  value=\"\" data-item=\"\" ></option>";
    }
    $.each(respond, function(index, value) {
        if (value.disabled) {
            option += "<option disabled value='" + value.value + "' data-item='" + JSON.stringify(value).replace(/\'/g, ' ') + "' >" + value.text + "</option>";
        } else { option += "<option  value='" + value.value + "' data-item='" + JSON.stringify(value).replace(/\'/g, ' ') + "'  >" + value.text + "</option>"; }
    });
    $(combobox_id).html(option);
    $(combobox_id).select2({ placeholder: placeHolder ? placeHolder : '', tags: true, allowClear: true });

    $(combobox_id).val(defaultSelectValue).trigger("change");
}
/**
 * Tách dùng riêng cho combobox đẩy cả giá trị row trong source vào data-item
 * @param {any} combobox_id
 * @param {any} name
 * @param {any} value
 * @param {any} respond
 * @param {any} typeFirstRow
 * @param {any} defaultSelectValue
 */
function select2_bindingComboDynamic(combobox_id, respond, name, value, typeFirstRow, defaultSelectValue, placeHolder) {

    var option = "";
    if (typeFirstRow == -1) {
        option += "<option  value=" + -1 + " data-item='" + -1 + "' >Tất cả</option>";
    } else if (typeFirstRow == 0) {
        option += "<option  value=\"\" data-item=\"\" ></option>";
    }
    $.each(respond, function(index, item) {
        if (item.disabled) {
            option += "<option disabled value='" + item[value] + "' data-item='" + JSON.stringify(item).replace(/\'/g, ' ') + "' >" + item[name] + "</option>";
        } else { option += "<option value='" + item[value] + "' data-item='" + JSON.stringify(item).replace(/\'/g, ' ') + "' >" + item[name] + "</option>"; }
    });
    $(combobox_id).html(option);
    $(combobox_id).select2({
        placeholder: placeHolder ? placeHolder : '',
        shouldFocusInput: function() {
            return false;
        }
    });
    $(combobox_id).val(defaultSelectValue).trigger("change");

}
/**
 * Tách từ select2_bindingExtenCodeValue để dùng cho trường hợp có source trước
 * @param {any} dataSource
 */
function select2_bindingBySourceWithConfig(combobox_id, respond, typeFirstRow, config, defaultSelectValue) {
    //
    var option = "";
    if (respond && typeFirstRow == -1) {
        respond.unshift({ value: -1, text: "Tất cả" });
    } else if (respond && typeFirstRow == 0) {
        respond.unshift({ value: null, text: "" });
    }

    var a_field = config.data_value.split(';');
    $.each(respond, function(index, value) {
        var a_value = [];
        for (var i = 0; i < a_field.length; i++) {
            a_value.push(value[a_field[i]]);
        }

        if (value.disabled) {
            option += '<option disabled value=' + value[config.value] + ' data-value="' + JSON.stringify(a_value).replace(/\'/g, ' ') + '">' + value[config.text] + '</option>';
        } else {
            option += '<option value=' + value[config.value] + ' data-value="' + JSON.stringify(a_value).replace(/\'/g, ' ') + '">' + value[config.text] + '</option>';
        }

    });

    $(combobox_id).html(option);
    $(combobox_id).select2();
    if (defaultSelectValue)
        $(combobox_id).val(defaultSelectValue).trigger("change");


}
/**
 * Hàm cắt lấy ký tự dầu tiên từ các câu riêng biệt trong chuỗi
 * @param {any} str
 */
function getfirstchars(str) {
    if (!str)
        return '';
    var sResul = '';
    var kt = str.split(' ');
    for (var i = 0; i < kt.length; i++) {
        if (kt[i])
            sResul += kt[i].trim().substring(0, 1).toUpperCase();
    }

    return sResul;
}
/**
 * 
 * @param {any} func hàm trả về
 * @param {any} title title form
 * @param {any} mesage câu thông báo
 * @param {obj} obj truyền thêm để xử lý gì đó (là đối tượng truyền vào là gì trả ra y thế)
 */
function showConfirm(func, title, mesage, obj, isAlert, funcCancel) {
    if (isAlert == true) {
        $('#popup-confirm button.btn-default').hide();
    } else {
        $('#popup-confirm button.btn-default').show();
    }
    if (!title || title.trim() == "") {
        title = "XÓA DỮ LIỆU";
    }
    if (!mesage || mesage.trim() == "") {
        mesage = "Bạn có chắc chắn muốn xóa bản ghi?";
    }
    $('#sysConfirmTitle').html(title);
    $('#systemMesageConfirm').text(mesage);
    $('#popup-confirm').unbind('hidden.bs.modal').on('hidden.bs.modal', function(e) {
        if (funcCancel) {
            funcCancel(e);
        }
    })
    $('#popup-confirm').modal('show');
    $('.btn-confirm-systems').click(function() {
        $('#popup-confirm').modal('hide');
        if (typeof func == "function") {
            func(obj);
        }
        $(".btn-confirm-systems").unbind("click");
    });
    return false;
}

function showConfirmHtmlExtend(func, title, mesage, obj, html) {
    if (!title || title.trim() == "") {
        title = "XÓA DỮ LIỆU";
    }
    if (!mesage || mesage.trim() == "") {
        mesage = "Bạn có chắc chắn muốn xóa bản ghi?";
    }
    $('#sysConfirmTitle').html(title);
    $('#systemMesageConfirm').text(mesage);
    $('#popup-confirm').modal('show');
    $("#table-popup-content").html(html);
    $('.btn-confirm-systems').click(function() {
        $('#popup-confirm').modal('hide');
        if (typeof func == "function") {
            func(obj);
        }
        $(".btn-confirm-systems").unbind("click");
    });
    return false;
}

/*=========== DATATABLE.JS ============= */

/**
 * uncheck toàn bộ bản ghi trong datatable
 * @table: table = $('#table_id').DataTable(config);
 */
function DATATABLE_UNCHECK(table) {
    table.rows().every(function(index) {
        table.rows(index).nodes().to$().find('input[type="checkbox"]').prop('checked', false);
    });
}


/*=========== TABLE.JS ============= */

/**
 * uncheck toàn bộ bản ghi trong table html
 * @table_id: element id của table
 */
function TABLE_UNCHECK(table_id) {
    $(table_id).find('input[type="checkbox"]:checked').each(function() {
        $(this).prop('checked', false);
    });
}

function FormData_RemoveNull(a_input) {
    for (var index in a_input) {
        if (a_input[index] === "null") {
            a_input[index] = null;
        }
    }
    return a_input;
}

var ChuSo = new Array(" không ", " một ", " hai ", " ba ", " bốn ", " năm ", " sáu ", " bảy ", " tám ", " chín ");
var Tien = new Array("đồng", " nghìn", " triệu", " tỷ", " nghìn tỷ", " triệu tỷ");

//1. Hàm đọc số có ba chữ số;
function DocSo3ChuSo(baso) {
    var tram;
    var chuc;
    var donvi;
    var KetQua = "";
    tram = parseInt(baso / 100);
    chuc = parseInt((baso % 100) / 10);
    donvi = baso % 10;
    if (tram == 0 && chuc == 0 && donvi == 0) return "";
    if (tram != 0) {
        KetQua += ChuSo[tram] + " trăm ";
        if ((chuc == 0) && (donvi != 0)) KetQua += " linh ";
    }
    if ((chuc != 0) && (chuc != 1)) {
        KetQua += ChuSo[chuc] + " mươi";
        if ((chuc == 0) && (donvi != 0)) KetQua = KetQua + " linh ";
    }
    if (chuc == 1) KetQua += " mười ";
    switch (donvi) {
        case 1:
            if ((chuc != 0) && (chuc != 1)) {
                KetQua += " mốt ";
            } else {
                KetQua += ChuSo[donvi];
            }
            break;
        case 5:
            if (chuc == 0) {
                KetQua += ChuSo[donvi];
            } else {
                KetQua += " lăm ";
            }
            break;
        default:
            if (donvi != 0) {
                KetQua += ChuSo[donvi];
            }
            break;
    }
    return KetQua;
}

//2. Hàm đọc số thành chữ (Sử dụng hàm đọc số có ba chữ số)

function DocTienBangChu(SoTien) {
    var lan = 0;
    var i = 0;
    var so = 0;
    var KetQua = "";
    var tmp = "";
    var ViTri = new Array();
    if (SoTien < 0) return "Số tiền âm";
    if (SoTien == 0) return "Không đồng";
    if (SoTien > 0) {
        so = SoTien;
    } else {
        so = -SoTien;
    }
    if (SoTien > 8999999999999999) {
        //SoTien = 0;
        return "Số quá lớn";
    }
    ViTri[5] = Math.floor(so / 1000000000000000);
    if (isNaN(ViTri[5]))
        ViTri[5] = "0";
    so = so - parseFloat(ViTri[5].toString()) * 1000000000000000;
    ViTri[4] = Math.floor(so / 1000000000000);
    if (isNaN(ViTri[4]))
        ViTri[4] = "0";
    so = so - parseFloat(ViTri[4].toString()) * 1000000000000;
    ViTri[3] = Math.floor(so / 1000000000);
    if (isNaN(ViTri[3]))
        ViTri[3] = "0";
    so = so - parseFloat(ViTri[3].toString()) * 1000000000;
    ViTri[2] = parseInt(so / 1000000);
    if (isNaN(ViTri[2]))
        ViTri[2] = "0";
    ViTri[1] = parseInt((so % 1000000) / 1000);
    if (isNaN(ViTri[1]))
        ViTri[1] = "0";
    ViTri[0] = parseInt(so % 1000);
    if (isNaN(ViTri[0]))
        ViTri[0] = "0";
    if (ViTri[5] > 0) {
        lan = 5;
    } else if (ViTri[4] > 0) {
        lan = 4;
    } else if (ViTri[3] > 0) {
        lan = 3;
    } else if (ViTri[2] > 0) {
        lan = 2;
    } else if (ViTri[1] > 0) {
        lan = 1;
    } else {
        lan = 0;
    }
    for (i = lan; i >= 0; i--) {
        tmp = DocSo3ChuSo(ViTri[i]);
        KetQua += tmp;
        if (ViTri[i] > 0) KetQua += Tien[i];
        if ((i > 0) && (tmp.length > 0)) KetQua += ','; //&& (!string.IsNullOrEmpty(tmp))
    }
    if (KetQua.substring(KetQua.length - 1) == ',') {
        KetQua = KetQua.substring(0, KetQua.length - 1);
    }
    KetQua = KetQua.substring(1, 2).toUpperCase() + KetQua.substring(2);

    if (KetQua.indexOf('đồng') <= 0) KetQua = KetQua + ' đồng';
    return KetQua; //.substring(0, 1);//.toUpperCase();// + KetQua.substring(1);
}
/**
 * format string date dạng dd/MM/yyyy sang yyyy-mm-dd
 * @param {any} date
 */
function formatStringDate(date) {
    if (date) {
        var arrDate = date.split('/');
        var day = (arrDate[0].length == 1 ? "0" + arrDate[0] : arrDate[0]);
        var month = (arrDate[1].length == 1 ? "0" + arrDate[1] : arrDate[1]);
        return arrDate[2] + "-" + month + "-" + day;;
    } else {
        return "";
    }
}
/**
 *hàm check quyền chung
 * @param {any} idFormList id form danh sách (có kèm dấu #)
 */
function checkPermissions(idFormList) {
    var a_hide = GET_INPUT_DATA_BYID('#form_hide');
    var session = new GETSESSION().Session;
    if (session.userLevel == UserLevel_Value.ADMIN || session.userLevel == UserLevel_Value.ROOT) {

        var listButton = $(idFormList).find('[data-permission]');
        $.each(listButton, function(i, item) {
            $(item).show();
        });
    } else if (!a_hide || !a_hide.Permissions || a_hide.Permissions == 'null' || JSON.parse(a_hide.Permissions)["Views"] != true) {
        window.location.assign('/error/403');
    } else {
        var listButton = $(idFormList).find('[data-permission]');
        var permissions = JSON.parse(a_hide.Permissions);
        $.each(listButton, function(i, item) {

            var attr = $(item).attr('data-permission');
            if (attr == 'Views' && permissions[attr] == false) {
                window.location.assign('/error/403');
            }
            if (permissions[attr] == false) {
                $(item).hide();
            } else {
                $(item).show();
            }
        });

    }
}

/**
 * Tính số lượng quy đổi
 * @param {any} SLXuat: số lượng cần quy đổi
 * @param {any} SLQuyDoi số lượng trong bảng tỷ lệ quy đổi của đối tượng cần quy đổi
 * @param {any} SLQuyDoi_SD số lượng sử dụng trong bảng tỷ lệ quy đổi
 */
function TinhSoLuongQuyDoi(SLXuat, SLQuyDoi, SLQuyDoi_SD, isRound) {
    //
    if (isRound == undefined || isRound == null) isRound = true;
    var a_hide = GET_INPUT_DATA_BYID('#form_hide');
    var a_config = JSON.parse(a_hide.config);
    decimal_number = a_config.FormatAmount;
    if (!SLQuyDoi || SLQuyDoi == 0) SLQuyDoi = 1;
    if (isRound) { //tiendv sửa tạm nếu số lượng quy đổi tỷ lệ mà bị sai =0 thì phải lấy bằng sl xuất
        //return ((SLXuat ? SLXuat : 0) * (SLQuyDoi_SD ? SLQuyDoi_SD : 1) / SLQuyDoi).toFixed(decimal_number);
        if (decimal_number == 0)
            return Math.floor(((SLXuat ? SLXuat : 0) * (SLQuyDoi_SD ? SLQuyDoi_SD : 1) / SLQuyDoi));
        else if (decimal_number == 1)
            return Math.floor(((SLXuat ? SLXuat : 0) * (SLQuyDoi_SD ? SLQuyDoi_SD : 1) / SLQuyDoi) * 10) / 10;
        else if (decimal_number == 2)
            return Math.floor(((SLXuat ? SLXuat : 0) * (SLQuyDoi_SD ? SLQuyDoi_SD : 1) / SLQuyDoi) * 100) / 100;
        else if (decimal_number == 3)
            return Math.floor(((SLXuat ? SLXuat : 0) * (SLQuyDoi_SD ? SLQuyDoi_SD : 1) / SLQuyDoi) * 1000) / 1000;
        else if (decimal_number == 4)
            return Math.floor(((SLXuat ? SLXuat : 0) * (SLQuyDoi_SD ? SLQuyDoi_SD : 1) / SLQuyDoi) * 10000) / 10000;
    } else return ((SLXuat ? SLXuat : 0) * (SLQuyDoi_SD ? SLQuyDoi_SD : 1) / SLQuyDoi);
}

/**
 * 
 * @param {any} value
 */
function convertToNumber(value) {
    if (!value) return 0;
    if (value && !$.isNumeric(value) && value.indexOf(',')) {
        return TO_NUMBER(value, FORMAT_NUMBER(3));
    } else {
        return parseFloat(value);
    }
}

/**
 * Lấy list obj dữ liệu theo các class (với mỗi 1 class tạo ra 1 obj)
 * @param {any} className
 */
function getListDataObjectByClass(className) {
    var el = $(className);
    var listObj = [];
    $.each(el, function(index, item) {
        var obj = {};
        $(item).find(':input,textarea,select').each(function(i, control) {
            if ($(control) && $(control).attr('name')) {
                var name = $(control).attr("name");
                var value = $(control).val();
                if ($(control).attr('type') == 'checkbox') {
                    if (value == 'on') {
                        obj[name] = true;
                    } else
                        obj[name] = false;
                } else if ($(control).hasClass('ipm-currency') || $(control).hasClass('ipm-decimal') || $(control).hasClass('ipm-integer')) {

                    obj[name] = TO_NUMBER(value, FORMAT_NUMBER(2));
                } else {
                    obj[name] = value;
                }

            }
        });

        listObj.push(obj);
    });
    return listObj;
}


/**
 * 
 * @param {any} idcombo id combo dang #abc
 * @param {any} url service 
 * @param {any} funselect ham hung su kienj select
 * @param {any} listColumn list cot hien thi
 * @param {any} config: config: isHeader,dataType,async,search,autoFill,autoFocus,delay 
 */
function bindAutocompleteBox(idcombo, url, funSelect, listColumn, auconfig) {
    if (auconfig == undefined) {
        auconfig = { dataType: 'json', async: false, autoFill: true, autoFocus: true, delay: 500, text: 'TenDuoc', value: 'DuocQG', method: 'GET' };
    }
    var isScan = false;
    var a_hide = GET_INPUT_DATA_BYID('#form_hide');
    var combo = $(idcombo);
    var idHiden = $(idcombo + '-id');
    $(idcombo).autocomplete({
        minLength: 0,
        source: function(request, response) {
            $.ajax({
                url: url,
                dataType: auconfig.dataType,
                async: auconfig.async,
                type: auconfig.method,
                data: {
                    b_session: a_hide.session,
                    search: request.term
                },
                success: function(data) {
                    response(data);
                    if (request.term && request.term.indexOf(';') >= 0 && data.length == 1) {
                        if (typeof(funSelect) == 'function') {
                            funSelect(data[0]);
                            combo.val(data[0][auconfig.display]);
                            idHiden.val(data[0][auconfig.value]);
                        }
                        isScan = false;
                    }

                }
            });

        },
        search: function(e, u) {
            if (isScan) {
                return false;
            } else {
                isScan = true;
            }
        },
        autoFill: auconfig.autoFill,
        autoFocus: auconfig.autoFocus,
        //focus: function (event, ui) {
        //    event.preventDefault();
        //},
        delay: auconfig.delay,
        select: function(event, ui) {
            isScan = false;
            combo.val(ui.item[auconfig.text]);
            idHiden.val(ui.item[auconfig.value]);
            if (typeof(funSelect) == 'function') {
                funSelect(ui.item, event);
            }
            return false;
        },
        create: function(event, ui) {
            $(this).data('ui-autocomplete')._renderItem = function(ul, item) {
                var item_column = '';
                $.each(listColumn, function(index, column) {
                    item_column += "<div style='float:left;padding:2px 8px;word-break: break-all; width:" + (column.width ? column.width : "150px") + "' > " + item[column.fieldName];
                    item_column += "</div>";
                });
                return $("<li>")
                    .append(item_column)
                    .appendTo(ul);
            }

        },
        open: function() {
            var item_header = "";
            var item_header = '';
            $.each(listColumn, function(index, item) {
                item_header += "<div style='float:left;padding:2px 8px; width:" + item.width + "' > " + item.header;
                item_header += "</div>";
            });
            $('ul.ui-autocomplete').prepend('<li class="list-header">' + item_header + '</li>');
        }
    })
    $(idcombo).click(function() {
        this.select();
        this.focus();
        $(this).autocomplete('search');
    });

    $(idcombo).bind("keydown.autocomplete", function() {
        if (event.keyCode == 13 || event.keyCode == 8) {
            isScan = false;
        };
    }).keydown(function(e) {
        if (e.keyCode == 13) {
            isScan = true;
            //console.log('  keydown ' + isScan);
            //$(this).autocomplete('select');
            e.preventDefault();
        };
    }).keyup(function(e, ui) {
        if (e.keyCode == 13) {
            isScan = false;
            //console.log('  keyup ' + isScan);
        }
    });
    $(idcombo).keypress(function(e, data, ui) {
        if (e.which != 13) {
            isScan = false;
        }
    });
}
/**
 * 
 * @param {any} idcombo id combo dang #abc
 * @param {any} listData: Dữ liệu truyền váo
 * @param {any} funselect ham hung su kienj select
 * @param {any} listColumn list cot hien thi
 * @param {any} config: config: isHeader,dataType,async,search,autoFill,autoFocus,delay 
 */
function bindAutocompleteBoxCustome(idcombo, listDuocKiemKe, funSelect, columns) {
    var auconfig = { dataType: 'json', async: false, autoFill: true, autoFocus: true, delay: 500, text: 'TenDuoc', value: 'DuocID', method: 'GET' };
    listColumn = [{ header: 'Mã ' + GetTenLoaiHang(), fieldName: 'MaDuoc', width: '20%' }, { header: 'Tên ' + GetTenLoaiHang(), fieldName: 'TenDuoc', width: '40%' }, { header: 'Số đăng ký', fieldName: 'SoDangKy', width: '20%' }, { header: 'Tên hoạt chất', fieldName: 'TenHoatChat', width: '20%' }];
    if (columns && columns.length > 0) {
        listColumn = columns;
    }
    var isScan = false;
    var a_hide = GET_INPUT_DATA_BYID('#form_hide');
    var combo = $(idcombo);
    var idHiden = $(idcombo + '-id');
    $(idcombo).autocomplete({
        minLength: 0,
        source: function(request, response) {
            var listResult = [];
            if (listDuocKiemKe && listDuocKiemKe.length > 0) {
                for (var i = 0; i < listDuocKiemKe.length; i++) {
                    var tenDuoc = listDuocKiemKe[i].TenDuoc ? listDuocKiemKe[i].TenDuoc : '';
                    var tenTheoBYT = listDuocKiemKe[i].TenTheoBYT ? listDuocKiemKe[i].TenTheoBYT : '';
                    var maDuoc = listDuocKiemKe[i].MaDuoc ? listDuocKiemKe[i].MaDuoc : '';
                    var soDangKy = listDuocKiemKe[i].SoDangKy ? listDuocKiemKe[i].SoDangKy : '';
                    var tenHoatChat = listDuocKiemKe[i].TenHoatChat ? listDuocKiemKe[i].TenHoatChat : '';
                    if (!request.term || listDuocKiemKe[i].QRCode == request.term || tenDuoc.toLowerCase().indexOf(request.term.toLocaleLowerCase()) >= 0 || tenTheoBYT.toLocaleLowerCase().indexOf(request.term.toLocaleLowerCase()) >= 0 || maDuoc.toLocaleLowerCase().indexOf(request.term.toLocaleLowerCase()) >= 0 || soDangKy.toLocaleLowerCase().indexOf(request.term.toLocaleLowerCase()) >= 0 || tenHoatChat.toLocaleLowerCase().indexOf(request.term.toLocaleLowerCase()) >= 0) {
                        listResult.push(listDuocKiemKe[i]);
                    }
                    if (listResult.length == 30) {
                        break;
                    }
                }
            }

            response(listResult);
            if (request.term && request.term.indexOf(';') >= 0 && listResult.length == 1) {
                if (typeof(funSelect) == 'function') {
                    funSelect(data[0]);
                }
                isScan = false;
            }

        },
        search: function(e, u) {
            if (isScan) {
                return false;
            } else {
                isScan = true;
            }
        },
        autoFill: auconfig.autoFill,
        autoFocus: auconfig.autoFocus,
        //focus: function (event, ui) {
        //    event.preventDefault();
        //},
        delay: auconfig.delay,
        select: function(event, ui) {
            isScan = false;
            combo.val(ui.item[auconfig.text]);
            idHiden.val(ui.item[auconfig.value]);
            if (typeof(funSelect) == 'function') {
                funSelect(ui.item, event);
            }
            return false;
        },
        create: function(event, ui) {
            $(this).data('ui-autocomplete')._renderItem = function(ul, item) {
                var item_column = '';
                $.each(listColumn, function(index, column) {
                    item_column += "<div style='float:left;padding:2px 8px;word-break: break-all; width:" + (column.width ? column.width : "150px") + "' > " + item[column.fieldName];
                    item_column += "</div>";
                });
                return $("<li>")
                    .append(item_column)
                    .appendTo(ul);
            }

        },
        open: function() {
            var item_header = "";
            var item_header = '';
            $.each(listColumn, function(index, item) {
                item_header += "<div style='float:left;padding:2px 8px; width:" + item.width + "' > " + item.header;
                item_header += "</div>";
            });
            $('ul.ui-autocomplete').prepend('<li class="list-header">' + item_header + '</li>');
        }
    })
    $(idcombo).click(function() {
        this.select();
        this.focus();
        $(this).autocomplete('search');
    });

    $(idcombo).bind("keydown.autocomplete", function() {
        if (event.keyCode == 13 || event.keyCode == 8) {
            isScan = false;
        };
    }).keydown(function(e) {
        if (e.keyCode == 13) {
            isScan = true;
            //console.log('  keydown ' + isScan);
            //$(this).autocomplete('select');
            e.preventDefault();
        };
    }).keyup(function(e, ui) {
        if (e.keyCode == 13) {
            isScan = false;
            //console.log('  keyup ' + isScan);
        }
    });
    $(idcombo).keypress(function(e, data, ui) {
        if (e.which != 13) {
            isScan = false;
        }
    });
}
/**
 * set theo validate not require theo loại control
 * @param {any} controls
 * @param {any} type
 */
function setErrorRequeriedByTypeControls(controls, type, closest) {
    if (!closest) closest = "span";
    for (var i = 0; i < controls.length; i++) {
        var requiredField = controls[i];
        var divParent = $(requiredField).closest(closest);
        if (type == 'input') {
            $(requiredField).addClass('control-error');
        } else {
            $(divParent).addClass('control-error');
        }

        $(requiredField).change(function() {
            if (this.value && ((this.value != '' || type == 'textarea') || this.value > 0 && type == 'select')) {
                $(divParent).removeClass('control-error');
            } else if (this.value != '' && type == 'input') {
                $(this).removeClass('control-error');
            } else {
                $(divParent).addClass('control-error');
            }
        });
    }
}
/**
 * validate theo id form
 * @param {any} idForm
 */
function validateRequiredFields(idForm) {
    var isValid = true;
    //validate số điện thoại
    $(idForm).find(' input').filter('[data-phone]').each(function(i, fieldPhone) {
        if (!$(fieldPhone).attr('required') || ($(fieldPhone).val() && $(fieldPhone).val().trim().length > 0)) {
            if (!validatePhoneNumber($(fieldPhone).val())) {
                isValid = false;
                showMessageError(fieldPhone);
            } else {
                hideMessageError(fieldPhone);
            }
            $(fieldPhone).change(function() {
                if (!validatePhoneNumber(this.value)) {
                    showMessageError(fieldPhone, 'Số điện thoại sai định dạng.');
                } else {
                    hideMessageError(fieldPhone);
                }
            });
        }

    });

    //new validate email
    $(idForm).find(' input').filter('[data-email]').each(function(i, fieldEmail) {
        if (!$(fieldEmail).attr('data-batbuoc')) {
            if (($(fieldEmail).val() && $(fieldEmail).val().trim().length > 0)) {
                if (!validateEmail($(fieldEmail).val())) {
                    isValid = false;
                    showMessageError(fieldEmail);
                } else {
                    hideMessageError(fieldEmail);
                }
                $(fieldEmail).change(function() {
                    if (!validateEmail(this.value)) {
                        showMessageError(fieldEmail, 'Email sai định dạng.');
                    } else {
                        hideMessageError(fieldEmail);
                    }
                });
            }
        } else {
            if (($(fieldEmail).val() && $(fieldEmail).val().trim().length > 0)) {
                if (!validateEmail($(fieldEmail).val())) {
                    isValid = true;
                } else {
                    hideMessageError(fieldEmail);
                }
                $(fieldEmail).change(function() {
                    if (!validateEmail(this.value)) {
                        showMessageError(fieldEmail, 'Email không đúng định dạng.');
                    } else {
                        hideMessageError(fieldEmail);
                    }
                })
            }
        }
    });

    $(idForm).find(' input,textarea').filter('[data-batbuoc]').each(function(i, requiredField) {
        if ($(requiredField).val() == '') {
            showMessageError(requiredField);
            isValid = false;
        }
        if ($(requiredField).hasClass('date')) {
            $(requiredField).datepicker().on('dp.change', function(ev) {
                if (!this.value || this.value == '') {
                    showMessageError(this);
                } else {
                    hideMessageError(this);
                }
            });
        } else {
            $(requiredField).change(function() {
                if (!this.value || this.value == '') {
                    showMessageError(this);
                } else {
                    hideMessageError(this);
                }
            });
        }
    });
    $(idForm).find(' select').filter('[data-batbuoc]').each(function(i, requiredField) {
        var minValue = $(this).attr('data-min') ? $(this).attr('data-min') : 1;
        if (this.value == "" || (this.value < minValue)) {
            isValid = false;
            showMessageError(requiredField);
        }

        $(requiredField).change(function() {
            if (this.value > 0 || (this.value < minValue)) {
                hideMessageError(this);
            } else {
                showMessageError(this);
            }
        });
    });

    return isValid;
}
/**
 * validate email
 * @param {any} email
 */
function validateEmail(email) {
    if (!email)
        return true;
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return filter.test(email);
}
/**
 * validate số điện thoại
 * @param {any} phone
 */
function validatePhoneNumber(phone) {
    if (!phone)
        return true;

    phone = phone.replace('(+84)', '+84');
    if (phone.trim().indexOf('+84') <= 0) {
        phone = phone.replace('(+84)', '0');
        phone = phone.replace('+84', '0');
        phone = phone.replace(/ /g, '');
    }

    if (phone != '') {
        if (phone.match(/^\d{10}/) || phone.match(/^\d{11}/)) {
            return true;
        }
    }
    return false;
}
/**
 * 
 * @param {any} requiredField
 */
function showMessageError(requiredField, msg) {
    if (!msg) msg = "Vui lòng nhập " + $(requiredField).attr('data-msg');
    $('#lbl_' + $(requiredField).attr('id')).text(msg);
    $('#lbl_' + $(requiredField).attr('id')).show();
}
/**
 * 
 * @param {any} requiredField
 */
function hideMessageError(requiredField) {
    $('#lbl_' + $(requiredField).attr('id')).text('');
    $('#lbl_' + $(requiredField).attr('id')).hide();
}
/**
 * */

/**
 * 
 * @param {any} target
 * @param {any} data
 */
function showMask(target) {
    $(target + ' .btn').attr('disabled', 'disabled');
    $(target).mLoading('show');
}

function closeMask(target) {
    $(target).mLoading('hide');
    $(target).removeClass('overlay');
    $(target + ' .btn').removeAttr('disabled');

}

/**
 * Định dạng kiểu dữ liệu số  (dành cho grid devexpress )
 *  
 */
function FormatQuantity(decimal_number) {
    if (decimal_number == undefined) {
        var a_session = FORM_INPUT_GET_OBJECT('#form_hide');
        if (a_session && a_session.config) {
            var a_config = JSON.parse(a_session.config);
            decimal_number = a_config.FormatAmount;
        }
    }

    switch (decimal_number) {
        case 0:
            return '#,##0';
            break;
        case 1:
            return '#,##0.0';
            break;
        case 2:
            return '#,##0.00';
            break;
        case 3:
            return '#,##0.000';
            break;
        case 4:
            return '#,##0.0000';
            break;
        case 5:
            return '#,##0.00000';
            break;
        case 6:
            return '#,##0.000000';
            break;
        default:
            return '#,##0';
            break;

    }
    return '#,##0';
}

/**
 * Định dạng kiểu dữ liệu số  tiền  (dành cho grid devexpress )
 *  
 */
function FormatPrice(decimal_number) {
    if (decimal_number == undefined) {
        var a_session = FORM_INPUT_GET_OBJECT('#form_hide');
        if (a_session && a_session.config) {
            var a_config = JSON.parse(a_session.config);
            decimal_number = a_config.FormatPrice;
        }


    }
    switch (decimal_number) {
        case 0:
            return '#,##0';
            break;
        case 1:
            return '#,##0.0';
            break;
        case 2:
            return '#,##0.00';
            break;
        case 3:
            return '#,##0.000';
            break;
        case 4:
            return '#,##0.0000';
            break;
        case 5:
            return '#,##0.00000';
            break;
        case 6:
            return '#,##0.000000';
            break;
        default:
            return '#,##0';
            break;
    }

    return '#,##0';
}
/**
 * form mat cho kiểu số
 * @param {any} value
 * @param {any} format
 */
function NumberFormat(value, format) {
    if (!format || format == undefined || format == null) {
        format = FormatPrice();
    }
    if (value == undefined || value == '' || value == null) value = 0;
    if (format == undefined || format == '' || format == null) value = '0,0';
    return numeral(value).format(format);
}
/**
 * Check quyền theo action
 * @param {any} action
 */
function checkPermissionsByAction(action) {
    var a_hide = GET_INPUT_DATA_BYID('#form_hide');
    var session = new GETSESSION().Session;
    if (session.userLevel == UserLevel_Value.ADMIN || session.userLevel == UserLevel_Value.ROOT) {
        return true;
    } else if (!a_hide || !a_hide.Permissions || a_hide.Permissions == 'null' || JSON.parse(a_hide.Permissions)["Views"] != true) {
        return false;
    } else {
        var permissions = JSON.parse(a_hide.Permissions);
        if (permissions)
            return permissions[action];
        else return false;
    }
}
/**
 * 
 * @param {any} str
 */
function boDauTiengViet(str) {
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, " ");
    str = str.replace(/ + /g, " ");
    str = str.trim();
    return str;
}
/**
 * 
 * @param {any} str
 */
function rePlaceDauCach(str) {
    return str.replace(new RegExp(' ', 'g'), '');
}
/*
add check cho loại đang in*
*/
function setCheckButtonSaveAndIn(type, isSoLoHanDung) {
    if (!type || type == undefined) {
        var objTypeIn = localStorage.getItem('TypeInHoaDon');
        if (objTypeIn) {
            type = objTypeIn;
        } else {
            type = 'normal';
        }
    }
    if (isSoLoHanDung == undefined) {
        isSoLoHanDung = localStorage.getItem('isSoLoHanDung');
    }
    $('.dropdown-menu .glyphicon').removeClass('glyphicon-check').removeClass('checked');


    $('#' + type + ' .glyphicon').addClass('glyphicon-check').addClass('checked');
}

function showDropDownHelper() {
    var dropdownMenu;
    $(window).on('show.bs.dropdown', function(e) {
        var id = '';
        if (e && e.relatedTarget && $(e.relatedTarget).attr('id')) {
            id = '-' + $(e.relatedTarget).attr('id');
        }
        var itemDropMenu = $('.content .dropdown-menu-right' + id);
        dropdownMenu = $(e.target).find(itemDropMenu);
        $('body').append(dropdownMenu.detach());
        var eOffset = $(e.target).offset();
        dropdownMenu.css({
            'display': 'block',
            'top': eOffset.top + $(e.target).outerHeight(),
            'left': eOffset.left - 120
        });
    });

    $(window).on('hide.bs.dropdown', function(e) {
        $(e.target).append(dropdownMenu.detach());
        dropdownMenu.hide();
    });
}
/**
 * validate require tagbox của dev
 * @param {any} id
 */
function validatedxTagBox(id) {
    if ($(id).attr('data-batbuoc') && (!$(id).dxTagBox('instance').option('selectedItems') || $(id).dxTagBox('instance').option('selectedItems').length == 0)) {
        showMessageError(id, 'Vui lòng chọn ' + $(id).attr('data-msg'));
        return false;
    } else {
        return true;
    }
}

function addDays(date, days) {
    const copy = new Date(Number(date))
    copy.setDate(date.getDate() - days)
    return copy
}