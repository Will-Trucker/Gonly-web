const productContainers = [...document.querySelectorAll('.product-container')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

productContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})

import.meta.glob([
    '../img/Logos/logo-gonly-black-letters.png',
    '../img/Decoration/img-decoration.png',
    '../img/Decoration/Curve-Line.svg',
    '../img/Categories/Accesories.png',
    '../img/Categories/Beauty.png',
    '../img/Categories/Tecnology.png',
    '../img/Categories/Clothes.png',
    '../img/Categories/Cosmetics.png',
    '../img/Categories/Footwear.png',
    '../img/Products/fan.jpeg',
    '../img/Products/shoes.jpeg',
    '../img/Products/sofa.jpeg',
    '../img/Products/pc.png',
    '../img/Products/xbox-control.jpeg',
    '../img/Images/arrow.png',
    '../img/Images/card1.jpg',
    '../img/Images/card2.jpg',
    '../img/Images/card3.jpg',
    '../img/Images/card4.jpg',
    '../img/Images/card5.jpg',
    '../img/Images/card6.jpg',
    '../img/Images/card7.jpg',
    '../img/Images/card8.jpg',
    '../img/Images/card9.jpg',
    '../img/Images/card10.jpg'
]);



