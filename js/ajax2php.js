	$( document ).ready(function() {
		$("#edit").hide();
		$("#errorDiv").hide();
		$( "#addCountry" ).click(function() {
			$("#edit").slideDown();
			$(this).hide();
		});
		$("#submit").click(function () {	
			$.post( "../country/index.php", { countryName: $("#countryName").val(), countryCapitalName: $("#countryCapitalName").val(),countryPopulation: $("#countryPopulation").val()})
			.done(function( data ) {
				try {  //���� ����� �� POST ������ �������� JSON, ������ � ����� ���� ������, ������� ��
					errArray=$.parseJSON(data)
					$("#errorDiv").show();
					$("#errorDiv").text("");
					$("html, body").animate({ scrollTop: 0 }, "slow")
					$("#countryName, #countryCapitalName, #countryPopulation ").removeClass("is-invalid");
					$.each(errArray, function(n, elem) {
						$.each(elem, function(key, value) {
							$("#errorDiv").append("<li>"+value+"</li>");    
							$("#"+key).addClass("is-invalid");
						});
					});
					} catch(e) { // ���� ����� �� JSON, ������ ��� ��, ����������� �������� ��� ���������� ������
					location.reload(true);
				}
			});
		});
	});