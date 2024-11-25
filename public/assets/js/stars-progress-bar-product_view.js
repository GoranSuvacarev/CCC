// const views = document.getElementById('productView')
//     .getElementsByClassName('view');
// const editIcon = document.getElementById('edit-icon');
// const input = document.getElementsByClassName('input');
// const deleteIcon = document.getElementsByClassName('delete-icon');
// const iconDiv = document.getElementsByClassName('icon-div');
// const container = document.getElementById('image-container');
// const save = document.getElementById('save');
// const cancel = document.getElementById('cancel');
// let containerChildren = container.children;
//
//
//
//
// for (let i = 0; i < deleteIcon.length; i++) {
//     deleteIcon[i].addEventListener('click', function () {
//         deleteIcon[i].parentElement.parentElement.remove();
//         updateOrder();
//     });
// }
//
// editIcon.addEventListener('click', function () {
//     for (let i = 0; i < input.length; i++) {
//         input[i].removeAttribute('disabled');
//     }
//
//     for (let i = 0; i < iconDiv.length; i++) {
//         iconDiv[i].classList.remove('disable');
//     }
//
//     for(let i =0;i<containerChildren.length;i++){
//         containerChildren[i].setAttribute('draggable',"true");
//     }
//
//     document.getElementById('inc-dec').style.pointerEvents = 'auto';
//
//     save.classList.remove('disabled');
//     save.removeAttribute('disabled');
//     cancel.classList.remove('disabled');
//     cancel.removeAttribute('disabled');
//
// });
//
//
// container.addEventListener('dragover', allowDrop);
// container.addEventListener('drop', drop);
//
// function reloadInfo(event){
//     location.reload();
// }
//
//
// var fileInput = document.getElementById('image-input');
//
// fileInput.addEventListener('change', function () {
//     var isValidSize = validateFileSize(fileInput, maxSize);
//     if (!isValidSize) {
//         alert('Images size must be less than 10 MB');
//         // Clear the file input if needed
//         fileInput.value = '';
//     }else {
//         handleFileSelect(fileInput.files);
//     }
// });
//
// const viewsObjects= [
//     document.getElementById('product-info'),
//     document.getElementById('orders'),
//     document.getElementById('reviews'),
//     document.getElementById('stats'),
//     document.getElementById('settings'),
// ]
//
//
// for (let i = 0; i < views.length; i++) {
//     views[i].addEventListener('click', function (evt) {
//
//         for (let j = 0; j < views.length; j++) {
//             views[j].classList.remove('active');
//         }
//         views[i].classList.add('active');
//
//         for(let k = 0;k<viewsObjects.length;k++){
//             viewsObjects[k].style.display = 'none';
//             if(k === i){
//                 viewsObjects[k].style.display = 'block';
//             }
//         }
//     });
// }
//
// function updateOrder(){
//     containerChildren = container.children;
//     for(let i = 0;i<containerChildren.length;i++){
//         containerChildren[i].style.order = i;
//         containerChildren[i].getElementsByClassName('hidden-input')[0].value = i;
//     }
// }

const stars_container = document.getElementsByClassName('stars-container');
for(let element of stars_container){
    let rate = element.getAttribute('data-rate');
    let starsfill = element.getElementsByClassName('starfill');
    for(let i = 0; i < 5; i++){
        let star = element.getElementsByClassName('starfill')[i];
        if (rate > i) {
            if (rate < i+1) {
                // If the rating is between i and i+1, set the width of the star to represent the fractional part
                star.style.width = `${(rate - i) * 100 }%`;
            } else {
                // If the rating is greater than i, set the width of the star to 100%
                star.style.width = '100%';
            }
        } else {
            // If the rating is less than i, set the width of the star to 0%
            star.style.width = '0%';
        }
    }

}




