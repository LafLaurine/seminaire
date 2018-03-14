//Liste et tableaux des flux
var flux_list = {};
var flux_URIs = [];

var flux_actif = [];

$( document ).ready(function(){

	get_active_flux_list().done(data => {refresh_all(data); }).fail((xhr, status, error)=>{console.log(xhr,status,error);});

	$("body").on("click",".hide",function(e){
		
				console.log("clicked on : ",e,$(".hide").index(this));
		
				e.preventDefault();
				var i = $(".hide").index(this);
		
				$(".article").eq(i).fadeOut();				
	});

	$('.modal-trigger').click(function() {

	   $(".listeFlux").eq(0).find("ul").eq(0).html("<li>CHARGEMENT DE LA LISTE...</li>");

	   get_flux_list().done(data => {render(data);});
	 });


	$('body').on("click",".Switch",function() {
			
		toggleSwitch($(".Switch").index($(this)));
	});

	$('body').on("click",".refreshTrigger",function() {
		$('.refresh-wrapper').toggleClass('open');
	   $('.site').toggleClass('blur');
	});

});

function storeFluxActif(list)
{
	flux_actif=Object.keys(list);
}

function storeListofAllUris(list)
{
	flux_list = list;
	flux_URIs = Object.keys(flux_list);
}

function get_active_flux_list()
{
	return $.ajax({
		type:"GET",
		url:"http://localhost/seminaire/flux.php",
		data:
			{
				data: "flux_list_actif"
			},
		dataType:'json'
	});
}

function get_flux_list()
{
	return $.ajax({
		type:"GET",
		url:"http://localhost/seminaire/flux.php",
		data:
			{
				data: "flux_list"
			},
		dataType:'json'
	});
}

function refresh_all(flux_URIs)
{
	storeFluxActif(flux_URIs);

	console.log(flux_actif);

	for(var uri in flux_URIs)
	{
		(function loop(uri) {
			refresh(uri).done(data => {console.log("loading",uri,flux_actif.indexOf(uri));  $(".articles_list").eq(flux_actif.indexOf(uri)).html(data);});
		})(uri);
		
	}
}

function refresh(uri)
{ 
	return $.ajax({
		type:"GET",
		url:"http://localhost/seminaire/flux.php",
		data:
			{
				data: "flux",
				flux: uri
			},
		dataType:'html'
	});
};


function remove(uri){

	$.ajax({
		type:"POST",
		url:"http://localhost/seminaire/flux.php",
		data:
			{
				flux: uri,
				action: "delete"
			},
		dataType:'html',
		success : function(data){
			$(".flux_list").children().eq(flux_URIs.indexOf(uri)).remove();
			flux_URIs.splice(flux_URIs.indexOf(uri), 1);
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			/*$('#waiting').hide(500);
			$('#message').removeClass().addClass('error')
			.text('There was an error.').show(500);
			$('#demoForm').show(500);*/
		}
	});
}	

function add(uri){

	if(flux_actif.length<6)
	{

        $.ajax({
            type:"POST",
            url:"http://localhost/seminaire/flux.php",
            data:
                {
                    flux: uri,
                    action: "add"
                },
            dataType:'html',
			success : function(data){
				$(".flux_list").append(data);
				if (data == '') {
					alert("Perte de connexion");
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				/*$('#waiting').hide(500);
				$('#message').removeClass().addClass('error')
				.text('There was an error.').show(500);
				$('#demoForm').show(500);*/
			}
		});
	}
	else
	{
		
	}
}

function render(list)
{
	storeListofAllUris(list);

	console.log(list);

	var div = $(".listeFlux").eq(0).find("ul").eq(0);
	div.html("");

	var key;
	var i=0;

	for (key in list) {

		var flux = list[key];

		var balise = "<li>";
		balise+=flux.titre;
		balise+='<input type="checkbox">';
		balise+='<div class="Switch Round">';
		balise+='<div class="Toggle"></div>';
		balise+='</div>';
		balise+='</li>';

		div.append(balise);

		setSwitch($('.Switch').eq(i),flux.actif);
		
		hideCheckbox();
		i++;
	}
	
}

function hideCheckbox()
{
		  // Loops Through Each Toggle Switch On Page
		  $('.Switch').each(function() {
		
			// Search of a checkbox within the parent
			if ($(this).parent().find('input:checkbox').length){
			  
			  if (!$(this).parent().find('input:checkbox').hasClass("show")){ $(this).parent().find('input:checkbox').hide(); }
			  
			  }
			  
			}
		);
}

function toggleSwitch(index)
{
	var balise = $('.Switch').eq(index);

	var flux_uri = flux_URIs[index];

	if (balise.hasClass('On')){
		
		if(flux_actif.length>1)
		{
			balise.parent().find('input:checkbox').attr('checked', true);
			
		
			balise.removeClass('On').addClass('Off');

			
			remove(flux_uri);
		}
		
	  } else{ 
		if(flux_actif.length<6)
		{
			balise.parent().find('input:checkbox').attr('checked', false);

			balise.removeClass('Off').addClass('On');
	
			add(flux_uri);
		}	
	}
}

function setSwitch(balise,active)
{
	console.log(active);

	if (!active){
		
		balise.parent().find('input:checkbox').attr('checked', false);
		
	   
		balise.addClass('Off');
		
	  } else { 
		balise.parent().find('input:checkbox').attr('checked', true);

		balise.addClass('On');
		
	}
}

function fav(uri)
{
	$.ajax({
		type:"POST",
		url:"http://localhost/seminaire/archive.php",
		data:
			{
				article: uri,
				keywords: $("#keywords").val().split(",") 	
			},
		dataType:'html',
		success : function(data){
			keywords: $("#keywords").val("");		
			//TODO : changer classe et text() de la div "Favori"
			$('.fav').addClass('dejaFav');
			$('.fav').val('Déjà en favori');
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			/*$('#waiting').hide(500);
			$('#message').removeClass().addClass('error')
			.text('There was an error.').show(500);
			$('#demoForm').show(500);*/
		}
	});
}

function modalFav(uri)
{
	$("#validateFavori").off();

	$("#validateFavori").click(function()
	{	
		fav(uri);
	});
}