$("#btnPreview").click(function(){
    $('#imagePreview').css("display", "block");
});
$("#add_product").click(function(){
    $(".form_add_product").css("display", "block");
});
$("input[value='Cancel']").click(function(){
    $(".form_add_product").css("display", "none");
});

let files;
function previewImages(event) {
    const preview = document.getElementById('imagePreview');
    files = event.target.files;
    let len = preview.children.length + 1;
    if(files.length <= 4){
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
                // frame.setAttribute("id", `image${len}`);

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

                if(len >= 4){
                    $(".material-symbols-outlined").css("display", "none");
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
    else{
        console.log("Maximum 4 images");
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
        if(closeIcons[i] === clickedCloseIcon){
            files = removeFile(files, i);
        }
    }
    $(clickedCloseIcon).parent().remove();
    
    let countImages = $("#imagePreview").children(".frame").length;
    if(countImages === 3){
        $(".material-symbols-outlined").css("display", "block");
    }
    if(countImages === 0){
        $("input[type='file']").val("");
        $("#btnPreview").css({
            "opacity": "0.5",
            "pointer-events": "none",
            "color": "gray"
        });
    }
}
function limitCheckboxSelection(checkbox) {
    let checkboxes = document.querySelectorAll('input[name="option"]');
    checkboxes.forEach(function(item) {
        if (item !== checkbox) {
            item.checked = false;
        }
    });
}

