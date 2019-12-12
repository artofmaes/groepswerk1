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

function showSecCat() {
    var butseccat = document.getElementById("addseccat");
    if (butseccat.style.display === "block") {
        butseccat.style.display = "none";
    } else {
        butseccat.style.display = "block";
    }
}

function dropdownlist(listindex)
{

    document.uploadform.secategory.options.length = 0;

    switch (listindex)
    {
        case "catnat" :
            document.uploadform.secategory.options[0]=new Option("No secondary category","catnone");
            document.uploadform.secategory.options[1]=new Option("Human","catnathum");
            document.uploadform.secategory.options[2]=new Option("Inanimate Objects","catnatobj");
            document.uploadform.secategory.options[3]=new Option("Techniques","catnattech");
            break;

        case "cathum" :
            document.uploadform.secategory.options[0]=new Option("No secondary category","catnone");
            document.uploadform.secategory.options[1]=new Option("Nature","cathumnat");
            document.uploadform.secategory.options[2]=new Option("Inanimate Objects","cathumobj");
            document.uploadform.secategory.options[3]=new Option("Techniques","cathumtech");
            break;

        case "catobj" :
            document.uploadform.secategory.options[0]=new Option("No secondary category","catnone");
            document.uploadform.secategory.options[1]=new Option("Nature","catobjnat");
            document.uploadform.secategory.options[2]=new Option("Human","catobjhum");
            document.uploadform.secategory.options[3]=new Option("Techniques","catobjtech");
            break;

        case "cattech" :
            document.uploadform.secategory.options[0]=new Option("No secondary category","catnone");
            document.uploadform.secategory.options[1]=new Option("Nature","cattechnat");
            document.uploadform.secategory.options[2]=new Option("Human","cattechhum");
            document.uploadform.secategory.options[3]=new Option("Inanimate Objects","cattechobj");
            break;


        default:
            document.uploadform.secategory.options[0]=new Option("Select Category")
            break;
    }
    return true;
}