api_folder=document.URL.slice(0,document.URL.lastIndexOf('/'))+'/apis/';
contents_folder="/contents/";


function CheckToken() {
    if (!localStorage.token) {
        alert("未发现登录秘钥，请重新登录");
        location.assign(page_login);
    }
}

function toHTML(data, tagName, items) {
    var div=$("<div></div>");
    $.each(items, function (index, item) {
        if(typeof item.preText === 'undefined') {item.preText='';}
        
        var item=
            $(document.createElement(tagName))
            .addClass(item.key)
            .text(item.preText+data[item.key])
            .appendTo(div);
        
    });
    return $(div).html();
}

function apiCall(apiID, apiData, callbackSuccess, callbackIssues) {
    //This function works with apis that comply with Titanium/V3 standard.
    //This function requires jQuery library.
    //callbackIssues is optional.
    
    
    $.ajax({
        type: 'POST',
        url: api_folder + apiID + '.php',
        data: apiData,
        dataType: 'json',
        success: function (JSONresponse) {
            //console.log(JSONresponse);
            if(JSONresponse.status===0) {
                //If the remote call does not report an issue:
                callbackSuccess(JSONresponse.data)
            } else {
                //If there are issues:
                if (typeof callbackIssues === 'undefined') {
                    //If callbackIssues is not given, prompt the message, and follow redirection if given
                    alert(JSONresponse.message);
                    if (JSONresponse.redirection)
                        location.assign(JSONresponse.redirection);
                } else { 
                    //If callbackIssues is given
                    callbackIssues(JSONresponse);
                }
            }
        }
    });
}

function createForm_example() {
    var formDesign = {
        formID: "form",
        formContent: [
            {type: "input", name: "id", caption: "编号", attr: {type: "text", "readonly":true}},
            {type: "input", name: "name", caption: "姓名", attr: {type: "text"}},
            {type: "select", name: "method", caption: "支付手段", options: [
                {caption: "请选择支付手段", attr: {value:0} },
                {caption: "银行转账", attr: {value:1} },
                {caption: "微信支付（暂不可用）", attr: {value:101, "readonly":true}},
                {caption: "银联支付（暂不可用）", attr: {value:102, "readonly":true}},
                ]},
            ],
        submitCaption: "更新档案",
        submitFunction: function page_profile_update () {}
        };

    createForm(formDesign).appendTo("#container").trigger("create");
}

function createForm(formData) {
    //formData: {formID, formContent, submitCaption, submitFunction}
    var form=$("<form></form>").prop("id",formData.formID);
    var div=$("<div></div>")
        .attr("data-role","fieldcontain")
        .attr("data-type","horizontal")
        .appendTo(form);
    
    
    $.each(formData.formContent, function (index, formItem) {
       
        $("<label></label>")
            .attr("for", formData.formID+"__"+formItem.name)
            .text(formItem.caption)
            .appendTo(div);
         
        if (typeof formItem.attr === 'undefined') {
            formItem.attr={};
        }
        
        //Switch is needed
        var item;
        switch(formItem.type) {
            case "input":
                item = $("<input>")
                    .attr("type", formItem.type)
                    .appendTo(div);
                break;
            case "select":
                item = $("<select></select>")
                    .appendTo(div);
                $.each(formItem.options, function (index, option) {
                    $("<option></option>", option.attr)
                        .text(option.caption)
                        .appendTo(item);
                });
                break;
            default:
                alert("What is this? -> "+formItem.type);            
        }
        
        item.attr(formItem.attr)
            .attr("name", formItem.name)
            .prop("id", formData.formID+"__"+formItem.name)
    });

    $("<a></a>")
        .attr("href","#")
        .attr("data-role","button")
        .click(formData.submitFunction)
        .html(formData.submitCaption)
        .appendTo(form);
        
    return form;
}

function createForm_bootstrap_example(container) {

    var formDesign = {
        formID: "form",
        formItems: [
            {type: "input-text", name: "id",  attr: {"readonly":true, value:1}},
            {type: "input-email", name: "email", caption: "email", attr: {placeholder: "Enter email:"}},
            {type: "input-password", name: "password", caption: "password:"},
            {type: "input-checkbox", name: "check1", option: {'caption': "Remember me"}},
            {type: "textarea", attr:{ rows: 5}},
            {type: "button", option: {
                'caption': "submit",
                'special': 'btn-default',
                submit: {
                    'data': {x:1}, 'clickFunction': function () {alert("submit");}
                    }
                }
            }],
        };
        
    createForm_bootstrap(formDesign).appendTo(container);
}

function createForm_bootstrap(formData) {
    //formData: {formAttr, formItems, submitCaption, submitFunction}
    
    var form=$("<form></form>", {'class': 'form-horizontal', 'role':'form'});
    form.attr(formData.formAttr);
    formID=formData.formAttr.id;
    $.each(formData.formItems, function (index, formItem) {
        var div=$("<div></div>", {'class': 'form-group'}).appendTo(form);
        
        if (typeof formItem.caption !== 'undefined') {
            $("<label></label>", {'class': 'control-label col-sm-2', "for": formID+"__"+formItem.name})
                .text(formItem.caption)
                .appendTo(div);
        }
        
        div_control=$("<div></div>").addClass("col-sm-10");
        if (typeof formItem.caption === 'undefined')
            div_control.addClass("col-sm-offset-2");
            
        //Switch is needed
        var item;
        switch(formItem.type) {
            case "img":
                item = $("<img></img>", {'class': 'preview'});
                break;
            
            case "input-hidden":
                item = $("<input>", {'type': 'hidden', 'class': 'form-control'});
                break;
                
            case "input-text":
                item = $("<input>", {'type': 'text', 'class': 'form-control'});
                break;

            case "input-email":
                item = $("<input>", {'type': 'email', 'class': 'form-control'});
                break;
            
            case "input-password":
                item = $("<input>", {'type': 'password', 'class': 'form-control'});
                break;
            
            case "input-file": 
                item = $("<input>", {'type': 'file'});
                break;
                
            case "input-checkbox":
                alert("Checkbox may have problems");
                item = $("<label></label>")
                    .text(" "+formItem.option.caption)
                    .addClass("checkbox-inline")
                    .prepend($("<input>", {'type': 'checkbox'}));
                break;
            
            case "select":
                item = $("<select></select>", {'class': 'form-control'});
                $.each(formItem.options, function (selectIndex, selectOption) {
                    $("<option></option>", selectOption.attr)
                        .html(selectOption.caption)
                        .appendTo(item);
                });
                break;
            
            case "textarea":
                item = $("<textarea></textarea>", {'class': 'form-control'});
                break;
                
            case "button":
                item = $("<button></button>", {'type': 'submit', 'class':'form-control btn btn-primary'})
                    .text(formItem.option.caption);
                if(typeof formItem.option.submit !== 'undefined') {
                    item.click(formItem.option.submit.data, formItem.option.submit.clickFunction);
                }
                if(typeof formItem.option.special !== 'undefined') {
                    item.addClass(formItem.option.special);
                }
                break;
            
            case "customHTML":
                item = $(formItem.option.html);
                break;
                
            default:
                alert("What is this? -> "+formItem.type);
                item = $("<div></div>");
        }
        
        switch(formItem.type) {
            case "input-checkbox":
                item.find("input")
                    .attr("name", formItem.name)
                    .prop("id", formID+"__"+formItem.name);
                break;
                
            default:
                item.attr("name", formItem.name)
                    .prop("id", formID+"__"+formItem.name);
        }    
            
        if (typeof formItem.attr !== 'undefined') {
            item.attr(formItem.attr);
        }
        div_control.append(item);

        
        div.append(div_control);
    });

    return form;
}


function formData(form, data) {
    form=$(form);
    //Read or write
    if (typeof data === 'undefined') {
        //Read
        var data={};
        $.each(form.serializeArray(), function (index, item) {
            var obj={};
            obj[item.name]=item.value;
            
            $.extend(data, obj);
        });
        return data;
    } else {
        //Write
        $.each(data, function(name, value) {
            item=form.find("[name="+name+"]");
            //console.log(name);
            //console.log(value);
            if (item.length!=0) {
                item.val(value);
            }
        });
        return form;
    }
}