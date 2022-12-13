document.addEventListener("DOMContentLoaded", function () {
    $('#tbl').DataTable();
    $(".confirmar").submit(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Esta seguro de eliminar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'SI, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    })
    $("#nom_cliente").autocomplete({
        minLength: 3,
        source: function (request, response) {
            $.ajax({
                url: "ajaxe.php",
                dataType: "json",
                data: {
                    q: request.term
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $("#idcliente").val(ui.item.id);
            $("#nom_cliente").val(ui.item.label);
            $("#tel_cliente").val(ui.item.telefono);
            $("#dir_cliente").val(ui.item.direccion);
        }
    })
    $("#producto").autocomplete({
        minLength: 3,
        source: function (request, response) {
            $.ajax({
                url: "ajaxe.php",
                dataType: "json",
                data: {
                    pro: request.term
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $("#producto").val(ui.item.value);
            setTimeout(
                function () {
                    e = jQuery.Event("keypress");
                    e.which = 13;
                    registrarDetalle(e, ui.item.id, 1, ui.item.precio);
                }
            )
        }
    });

/*=============================================
EDITAR CATEGORIA
=============================================*/


$(".table").on("click", ".mas", function(){
	var idventa = $('#idventa').val();
	var idd = $(this).attr("idd");
	var nume =  $('#n'+idd+'').val();
	var can = $(this).attr("can");
	var op = $(this).attr("op");
console.log(nume);
    var detalleMas = 'detalleEdi'
    $.ajax({
        url: "ajaxe.php",
        data: {
            idd: idd,
            can: can,
            nume: nume,
            op: op,
            idventa: idventa,
            detalleMas: detalleMas
        },
        success: function (response) {
            console.log(response);
			
            if (response == 'sumado') {
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Se modifico la cantidad!',
                    showConfirmButton: false,
                    timer: 2000
                })
                /*document.querySelector("#producto").value = '';
                document.querySelector("#producto").focus();*/
                listar();
            } else if (response == 'ok') {
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Se resto cantidad al producto',
                    showConfirmButton: false,
                    timer: 2000
                })
                /*document.querySelector("#producto").value = '';
                document.querySelector("#producto").focus();*/
                listar();
            } else {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Error al procesar pedido',
                    showConfirmButton: false,
                    timer: 2000
                })
				listar();
            }
        }
    });


});

	
	
	
	
	
	
	
	
	
    $('#btn_generar').click(function (e) {
        e.preventDefault();
        var rows = $('#tblDetalle tr').length;
		var id = $('#idcliente').val();
		var idventa = $('#idventa').val();
		var obs = $('#obs').val();
		var tipo = $('#tipo_pago').val();
			if(id === ''){
			$("#idcliente").val(null);
			 Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: 'Por favor ingresar cliente para generar la venta',
                showConfirmButton: false,
                timer: 2000
            });
  			return false;
		  }
		  if(tipo === ''){
			 Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: 'Por favor selecione método de pago',
                showConfirmButton: false,
                timer: 2000
            });
  			return false;
		  }
			
        if (rows > 2) {
            var action = 'procesarVenta';
            
			
            $.ajax({
                url: 'ajaxe.php',
                async: true,
                data: {
                    procesarVenta: action,
                    id: id,
					idventa: idventa,
                    tipo: tipo,
                    obs: obs
                },
                success: function (response) {
                    const res = JSON.parse(response);
                    if (response != 'error') {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Venta Editada',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        /*setTimeout(() => {
                            generarPDF(res.id_cliente, res.id_venta);
                            location.reload();
                        }, 300);*/
                    } else {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: 'Error al generar la venta',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                },
                error: function (error) {

                }
            });
        }else{
            Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: 'Por favor ingresar al menos un  producto para generar la venta',
                showConfirmButton: false,
                timer: 2000
            })
        }
    });
    if (document.getElementById("detalle_venta")) {
        listar();
    }
})

function listar() {
	var idventa = $('#idventa').val();
    let html = '';
    let detalle = 'detalle';
    $.ajax({
        url: "ajaxe.php",
        dataType: "json",
        data: {
            detalle: detalle,
			idventa: idventa
        },
		
        success: function (response){
            response.forEach(row => {
                html += `<tr>
                <td>${row['id']}</td>
                <td>${row['descripcion']}</td>
                <td>
				
				<div class="input-group input-group-sm" style="width:100px;">
  <div class="input-group-append">
    <input style="width:40px" type="text" class="input-group-text" value="${row['cantidad']}" id="n${row['id']}">
    
  </div>
  <div class="input-group-append">
	<button class="mas btn btn-primary btn-sm" ca${row['id']}="" op="mas" can="${row['cantidad']}" idd="${row['id']}" id="no${row['id']}" type="button"><i class="fa fa-refresh" aria-hidden="true"></i></button>
  </div>
</div>
</td>
                <td>${row['precio']}</td>
                <td>${row['sub_total']}</td>
                <td><button class="btn btn-danger" type="button" onclick="deleteDetalle(${row['id']})">
                <i class="fa fa-trash" aria-hidden="true"></i></button></td>
                </tr>`;
			
			html_total = `${row['total']}`;

            });

            document.querySelector("#detalle_venta").innerHTML = html;
            document.querySelector("#total").innerHTML = html_total;
            //calcular();
            
        }
    });
}

function registrarDetalle(e, id, cant, precio) {
	var idventa = $('#idventa').val();
    if (document.getElementById('producto').value != '') {
        if (e.which == 13) {
            if (id != null) {
                let action = 'regDetalle';
                $.ajax({
                    url: "ajaxe.php",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        id: id,
                        cant: cant,
                        action: action,
                        precio: precio,
						idventa: idventa
                    },
                    success: function (response) {
                        if (response == 'registrado') {
                            Swal.fire({
                                position: 'top-center',
                                icon: 'success',
                                title: 'Producto Ingresado',
                                showConfirmButton: false,
                                timer: 2000
                            })
                            document.querySelector("#producto").value = '';
                            document.querySelector("#producto").focus();
                            listar();
                        } else if (response == 'actualizado') {
                            Swal.fire({
                                position: 'top-center',
                                icon: 'success',
                                title: 'Producto Actualizado',
                                showConfirmButton: false,
                                timer: 2000
                            })
                            document.querySelector("#producto").value = '';
                            document.querySelector("#producto").focus();
                            listar();
						} else if (response == 'error_stock') {
                            Swal.fire({
                                position: 'top-center',
                                icon: 'error',
                                title: 'Stock no esta disponible',
                                showConfirmButton: false,
                                timer: 2000
                            })
                            document.querySelector("#producto").value = '';
                            document.querySelector("#producto").focus();
                            listar();
                        } else {
                            Swal.fire({
                                position: 'top-center',
                                icon: 'error',
                                title: 'Error al ingresar el producto',
                                showConfirmButton: false,
                                timer: 2000
                            })
                        }
                    }
                });
            }
        }
    }
}
function deleteDetalle(id) {
    let detalle = 'Eliminar'
    $.ajax({
        url: "ajaxe.php",
        data: {
            id: id,
            delete_detalle: detalle
        },
        success: function (response) {
            console.log(response);
            if (response == 'restado') {
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Producto Descontado',
                    showConfirmButton: false,
                    timer: 2000
                })
                document.querySelector("#producto").value = '';
                document.querySelector("#producto").focus();
                listar();
            } else if (response == 'ok') {
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Producto Eliminado',
                    showConfirmButton: false,
                    timer: 2000
                })
                document.querySelector("#producto").value = '';
                document.querySelector("#producto").focus();
                listar();
            } else {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Error al eliminar el producto',
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        }
    });
}
function calcular() {
    // obtenemos todas las filas del tbody
    var filas = document.querySelectorAll("#tblDetalle tbody tr");

    var total = 0;

    // recorremos cada una de las filas
    filas.forEach(function (e) {

        // obtenemos las columnas de cada fila
        var columnas = e.querySelectorAll("td");

        // obtenemos los valores de la cantidad y importe
        var importe = parseFloat(columnas[4].textContent);

        total += importe;
    });

    // mostramos la suma total
    var filas = document.querySelectorAll("#tblDetalle tfoot tr td");
    filas[1].textContent = total.toFixed(2);
}
function generarPDF(cliente, id_venta) {
    url = 'pdf/generar.php?cl=' + cliente + '&v=' + id_venta;
    window.open(url, '_blank');
}
if (document.getElementById("sales-chart")) {
    const action = "sales";
    $.ajax({
        url: 'chart.php',
        type: 'POST',
        data: {
            action
        },
        async: true,
        success: function (response) {
            if (response != 0) {
                var data = JSON.parse(response);
                var nombre = [];
                var cantidad = [];
                for (var i = 0; i < data.length; i++) {
                    nombre.push(data[i]['descripcion']);
                    cantidad.push(data[i]['existencia']);
                }
                try {
                    //Sales chart
                    var ctx = document.getElementById("sales-chart");
                    if (ctx) {
                        ctx.height = 150;
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: nombre,
                                type: 'line',
                                defaultFontFamily: 'Poppins',
                                datasets: [{
                                    label: "Disponible",
                                    data: cantidad,
                                    backgroundColor: 'transparent',
                                    borderColor: 'rgba(220,53,69,0.75)',
                                    borderWidth: 3,
                                    pointStyle: 'circle',
                                    pointRadius: 5,
                                    pointBorderColor: 'transparent',
                                    pointBackgroundColor: 'rgba(220,53,69,0.75)',
                                }, {
                                    label: "Cantidad",
                                    data: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                                    backgroundColor: 'transparent',
                                    borderColor: 'rgba(40,167,69,0.75)',
                                    borderWidth: 3,
                                    pointStyle: 'circle',
                                    pointRadius: 5,
                                    pointBorderColor: 'transparent',
                                    pointBackgroundColor: 'rgba(40,167,69,0.75)',
                                }]
                            },
                            options: {
                                responsive: true,
                                tooltips: {
                                    mode: 'index',
                                    titleFontSize: 12,
                                    titleFontColor: '#000',
                                    bodyFontColor: '#000',
                                    backgroundColor: '#fff',
                                    titleFontFamily: 'Poppins',
                                    bodyFontFamily: 'Poppins',
                                    cornerRadius: 3,
                                    intersect: false,
                                },
                                legend: {
                                    display: false,
                                    labels: {
                                        usePointStyle: true,
                                        fontFamily: 'Poppins',
                                    },
                                },
                                scales: {
                                    xAxes: [{
                                        display: true,
                                        gridLines: {
                                            display: false,
                                            drawBorder: false
                                        },
                                        scaleLabel: {
                                            display: false,
                                            labelString: 'Month'
                                        },
                                        ticks: {
                                            fontFamily: "Poppins"
                                        }
                                    }],
                                    yAxes: [{
                                        display: true,
                                        gridLines: {
                                            display: false,
                                            drawBorder: false
                                        },
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Cantidad',
                                            fontFamily: "Poppins"

                                        },
                                        ticks: {
                                            fontFamily: "Poppins"
                                        }
                                    }]
                                },
                                title: {
                                    display: false,
                                    text: 'Normal Legend'
                                }
                            }
                        });
                    }
                } catch (error) {
                    console.log(error);
                }
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}
if (document.getElementById("polarChart")) {
    const action = "polarChart";
    $('.alertAddProduct').html('');
    $.ajax({
        url: 'chart.php',
        type: 'POST',
        async: true,
        data: {
            action
        },
        success: function (response) {
            if (response != 0) {
                var data = JSON.parse(response);
                var nombre = [];
                var cantidad = [];
                for (var i = 0; i < data.length; i++) {
                    nombre.push(data[i]['descripcion']);
                    cantidad.push(data[i]['cantidad']);
                }
            }
            try {

                // polar chart
                var ctx = document.getElementById("polarChart");
                if (ctx) {
                    ctx.height = 200;
                    var myChart = new Chart(ctx, {
                        type: 'polarArea',
                        data: {
                            datasets: [{
                                data: cantidad,
                                backgroundColor: [
                                    "rgb(0, 123, 255)",
                                    "rgb(255, 0, 0)",
                                    "rgb(0, 255, 0)",
                                    "rgb(0,0,0)",
                                    "rgb(0, 0, 255)"
                                ]

                            }],
                            labels: nombre
                        },
                        options: {
                            legend: {
                                position: 'top',
                                labels: {
                                    fontFamily: 'Poppins'
                                }

                            },
                            responsive: true
                        }
                    });
                }

            } catch (error) {
                console.log(error);
            }
        },
        error: function (error) {
            console.log(error);

        }
    });
}
function btnCambiar(e) {
    e.preventDefault();
    const actual = document.getElementById('actual').value;
    const nueva = document.getElementById('nueva').value;
    if (actual == "" || nueva == "") {
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Los campos estan vacios',
            showConfirmButton: false,
            timer: 2000
        })
    } else {
        const cambio = 'pass';
         $.ajax({
             url: "ajaxe.php",
             type: 'POST',
             data: {
                 actual: actual,
                 nueva: nueva,
                 cambio: cambio
             },
             success: function (response) {
                 console.log(response);
                 if (response == 'ok') {
                     Swal.fire({
                         position: 'top-center',
                         icon: 'success',
                         title: 'Contraseña modificado',
                         showConfirmButton: false,
                         timer: 2000
                     })
                     document.querySelector('frmPass').reset();
                     $("#nuevo_pass").modal("hide");
                 } else if (response == 'dif') {
                     Swal.fire({
                         position: 'top-center',
                         icon: 'error',
                         title: 'La contraseña actual incorrecta',
                         showConfirmButton: false,
                         timer: 2000
                     })
                 } else {
                     Swal.fire({
                         position: 'top-end',
                         icon: 'error',
                         title: 'Error al modificar la contraseña',
                         showConfirmButton: false,
                         timer: 2000
                     })
                 }
             }
         });
    }
}