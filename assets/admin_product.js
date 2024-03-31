let files;
function previewImages(event){
    const preview = document.getElementById('imagePreview');
    let countImages = $("#imagePreview").children(".frame").length;
    if(countImages <= 3){
        files = event.target.files;
        let len = preview.children.length + 1;
        
        if(files.length <= 4){
            $("#upload_label").children("span").remove();

            for (let i = 0; i < files.length; i++) {
                let file = files[i];
                let reader = new FileReader();

                reader.onload = function (event) {
                    let image = new Image();
                    image.style.maxWidth = '100px';
                    image.style.maxHeight = '100px';
                    image.src = event.target.result;

                    let frame = document.createElement("div");
                    frame.className = "frame";
                    frame.setAttribute("name", `image${len}`);

                    let closeIcon = document.createElement("i");
                    closeIcon.className ="fa-solid fa-circle-xmark";
                    closeIcon.setAttribute("name", "closeIcon");
                    closeIcon.setAttribute("id", `image${len}`);
                    closeIcon.onclick = function(){
                        removeImage(this);
                    }

                    let label = document.createElement("label");
                    label.className = "checkboxes";
                    
                    let checkbox = document.createElement("input");
                    checkbox.setAttribute("type", "checkbox");
                    checkbox.setAttribute("name", "checkbox");
                    checkbox.setAttribute("id", `checkbox${len}`);
                    checkbox.setAttribute("value", len);
                    checkbox.onchange = function() {
                        limitCheckboxSelection(this);
                    };
                    checkbox.className = `checkbox`;
                    
                    label.append(checkbox);
                    let text = document.createElement("span");
                    text.textContent = "Mark as main";
                    label.append(text);

                    frame.append(closeIcon);
                    frame.append(image);
                    frame.append(label);
                    
                    preview.append(frame);

                    if(len > 0){
                        $("#uploadImage").children("p").text(`${len} file/s`);
                    }
                    if(len > 0){
                        $("#btnPreview").css({
                            "opacity": "1",
                            "pointer-events": "auto",
                            "cursor": "default",
                            "color": "blue"
                        });
                    }
                    len += 1;
                };
                reader.readAsDataURL(file);
            }
        }
    }
    else{
        $("#upload_label").children("span").remove();
        
        $("#upload_label").append(" <span style='color: red; font-size: 15px;'>*maximum 4 images</span>")
        let fileInput = document.querySelector("input[type='file']");
        fileInput.value = '';
    }
}
function removeFile(files, indexToRemove){
    let newFiles = [];
    for(let j = 0; j < files.length; j++){
        if(j !== indexToRemove){
            newFiles.push(files[j]);
        }
    }
    return newFiles;
}
function removeImage(clickedCloseIcon){
    let closeIcons = document.querySelectorAll("i[name='closeIcon']");
    for(let i = 0; i < closeIcons.length; i++){
        /*for add a product*/
        if(closeIcons[i] === clickedCloseIcon && files !== undefined){
            files = removeFile(files, i);
        }
        /*for edit a product*/
        if(closeIcons[i] === clickedCloseIcon && files === undefined){
            
        }
    }
    $(clickedCloseIcon).parent().remove();
    
    let countImages = $("#imagePreview").children(".frame").length;
    if(countImages > 0 && countImages <= 3){
        $("#uploadImage").children("p").text(`${countImages} file/s`);
    }
    if(countImages === 0){
        $("#btnPreview").css({
            "opacity": "0.5",
            "pointer-events": "none",
            "color": "gray",
            "display": "block"
        });
        $("#imagePreview").css("display", "none");
        $("#uploadImage").children("p").text("No file choosen");
        $("#btnHide").css("display", "none");
    }
    /*if the checked as main image is removed*/
    setDefaultCheckbox();
}
function limitCheckboxSelection(checkbox) {
    let checkboxes = document.querySelectorAll('input[name="checkbox"]');
    checkboxes.forEach(function(item) {
        if (item !== checkbox) {
            item.checked = false;
        }
    });
}
function setDefaultCheckbox(){
    let foundChecked =  false;
    let checkboxes = document.querySelectorAll('input[name="checkbox"]');
    if(checkboxes.length !== 0){
        for(let i = 0; i < checkboxes.length; i++){
            if(checkboxes[i].checked){
                foundChecked = true;
            }
        }
        /*set the first checkbox checked as default*/
        if(!foundChecked){
            checkboxes[0].checked = true;
        }
    }
}
function clearForm(){
    $(".form_add_product").css("display", "none");
    /*clear the input field and images*/
    $("input[name='name']").val("");
    $("textarea[name='description']").val("");
    $("select[name='category']").val("");
    $("input[name='price']").val("");
    $("input[name='stocks']").val("");
    $("#imagePreview").children("div").remove();
    $("#imagePreview").css("display", "none");
    $("#uploadImage").children("p").text("No file choosen");
    $("#btnPreview").css({
        "opacity": "0.5",
        "pointer-events": "none",
        "color": "gray",
        "display": "block"
    });
    $("#btnHide").css("display", "none");
}
function findChecked(){
    /*check which checkbox is checked*/
    let checkboxes = document.querySelectorAll("input[name='checkbox']");
    let checkboxNum = 1;
    for(let x = 0; x < checkboxes.length; x++){
        if(checkboxes[x].checked === true){
            return checkboxNum;
        }
        checkboxNum++;
    }
}

