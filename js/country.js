var selectedCountry;
var selectedCounty;

// takes letter from country input box and passes it to readCountry.php
// on success shows suggesstion box 
$(document).ready(function ()
{
    $("#search-box").keyup(function ()
    {
        $.ajax({
            type: "POST",
            url: "readCountry.php",
            data: 'keyword=' + $(this).val(),
            success: function (data)
            {
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
            }
        });


    });

});

// val = country
// when you click on country, suggesstion box hides
// sends val to readCounty.php
function selectCountry(val)
{

    $("#search-box").val(val);
    $("#suggesstion-box").hide();
    $.ajax({
        type: "POST",
        url: 'readCounty.php',
        data: {val: val},
    });
}

// function to get counties
function County(query)
{
    if (query !== '')
    {
        $.ajax({
            url: 'readCounty.php',
            method: "POST",
            data: {val: query},
            success: function (data)
            {
                $('#countySelect').html(data);
            }
        });
    }
}

// function to get towns
function Town(query)
{
    if (query !== '')
    {
        $.ajax({
            url: 'readTown.php',
            method: "POST",
            data: {val: query},
            success: function (data)
            {
                $('#townSelect').append(data);
            }
        });
    }
}

// on click shows list of counties
$(document).on('click', 'li', function ()
{
    // removes county select box if it is already created
    if ($('#countySelect').length){
        $("br").remove("#br1");
        $("br").remove("#br2");
        $("br").remove("#br3");
        $("br").remove("#br4");
        $("select").remove("#countySelect");
        $("select").remove("#townSelect");
    }
    // creates county select box
    $('#suggesstion-box').after('<br id="br1"><select id="countySelect" name="county"><option disabled selected>Select county</option></select><br id="br4">');
    selectedCountry = $("#search-box").val();
    County(selectedCountry);
    
    // onchange creates town select box
    $("#countySelect").change(function ()
    {
        selectedCounty = $("#countySelect").val();
        Town(selectedCounty);
        
        // removes town select box if it is already created
        if ($('#townSelect').length){
        $("br").remove("#br2");
        $("br").remove("#br3");
        $("select").remove("#townSelect");
        }
        
        // creates town select box
        $('#countySelect').after('<br id="br2"><br id="br3"><select id="townSelect" name="town"><option disabled selected>Select town</option></select>');
    });


});











