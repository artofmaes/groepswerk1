//SCRIPT VOOR GROEPSWERK


$(document).ready(function(){
    // Scroll to top : Paulund : https://paulund.co.uk/how-to-create-an-animated-scroll-to-top-button-with-jquery
    //Check to see if the window is top if not then display button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 50) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},1000);
        return false;
    });



});

$(document).ready(function(){
    $('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: 120,
        fitWidth: true,
        gutter: 10

    });

});

// voor secondary category in upload
function showSecCat() {
    var seccat = document.getElementById("addseccat");
    if (seccat.style.display === "block") {
        seccat.style.display = "none";
        const select = document.querySelector('#afb_sec_cat');
        select.value = 'catnone';
    } else {
        seccat.style.display = "block";
    }
}

// voor secondary category in upload
function dropdownlist(listindex) {
    document.uploadform.afb_sec_cat.options.length = 0;

    switch (listindex)
    {
        case "catnat" :
            document.uploadform.afb_sec_cat.options[0]=new Option("No secondary category","catnone");
            document.uploadform.afb_sec_cat.options[1]=new Option("Human","cathum");
            document.uploadform.afb_sec_cat.options[2]=new Option("Inanimate Objects","catobj");
            document.uploadform.afb_sec_cat.options[3]=new Option("Techniques","cattech");
            break;

        case "cathum" :
            document.uploadform.afb_sec_cat.options[0]=new Option("No secondary category","catnone");
            document.uploadform.afb_sec_cat.options[1]=new Option("Nature","catnat");
            document.uploadform.afb_sec_cat.options[2]=new Option("Inanimate Objects","catobj");
            document.uploadform.afb_sec_cat.options[3]=new Option("Techniques","cattech");
            break;

        case "catobj" :
            document.uploadform.afb_sec_cat.options[0]=new Option("No secondary category","catnone");
            document.uploadform.afb_sec_cat.options[1]=new Option("Nature","catnat");
            document.uploadform.afb_sec_cat.options[2]=new Option("Human","cathum");
            document.uploadform.afb_sec_cat.options[3]=new Option("Techniques","cattech");
            break;

        case "cattech" :
            document.uploadform.afb_sec_cat.options[0]=new Option("No secondary category","catnone");
            document.uploadform.afb_sec_cat.options[1]=new Option("Nature","cathnat");
            document.uploadform.afb_sec_cat.options[2]=new Option("Human","cathum");
            document.uploadform.afb_sec_cat.options[3]=new Option("Inanimate Objects","catobj");
            break;


        default:
            document.uploadform.afb_sec_cat.options[0]=new Option("Select Category");
            break;
    }
    return true;
}