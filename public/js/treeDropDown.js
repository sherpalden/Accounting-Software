// let myInput = document.querySelector('#Account0');
// let listHolder = document.querySelector('#listHolder');

// document.addEventListener('click', (e) => {
//   e.preventDefault();
//   if (e.target == myInput) {
//     if (listHolder.style.display == 'block') {
//       listHolder.style.display = 'none';
//     }
//     else {
//       listHolder.style.display = 'block';
//     }
//   }
//   if (e.target.classList.contains('mainCat') ) {
//     let listIcon=e.target.children[0];
//     let subCategory = e.target.children[1];
//     if (subCategory.style.display==='block') {
//       subCategory.style.display='none';
//       listIcon.classList.remove("fa-minus");
//       listIcon.classList.add("fa-plus");
//     }
//     else{
//       subCategory.style.display='block';
//       listIcon.classList.remove("fa-plus");
//       listIcon.classList.toggle('fa-minus');
//     }
//   }
//   if (e.target.classList.contains('item')) {
//     myInput.value = e.target.textContent;
//   }

// });



$(document).on('click', '.inputHolder', function(e) {
    e.preventDefault();

    if ($(".mainCat").css('display', 'none')) {
        $(".mainCat").show();
    }
    else{
        $(".mainCat").hide();
    }



});
