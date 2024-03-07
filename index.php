<html>
<head>
    <title>API RF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <div class="col-md-12"><br><br>
                    <label>CNPJ</label>
                    <input type="text" onblur="checkCnpj(this.value)" data-mask="00.000.000/0000-00" class="form-control" />
                </div>                
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label>Razão Social</label>
                    <input type="text" id="razaosocial" class="form-control" />
                </div>         
                <div class="col-md-6">
                    <label>Fantasia</label>
                    <input type="text" id="fantasia" class="form-control" />
                </div>          
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label>Logradouro</label>
                    <input type="text" id="logradouro" class="form-control" />
                </div>   

                <div class="col-md-6">
                    <label>Número</label>
                    <input type="text" id="numero" class="form-control" />
                </div>   
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Município</label>
                    <input type="text" id="municipio" class="form-control" />
                </div>   

                <div class="col-md-6">
                    <label>UF</label>
                    <input type="text" id="uf" class="form-control" />
                </div>          
            </div>       
        </div>

    </div>

   


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>


<script>
    
    function checkCnpj(cnpj)
    {
        $.ajax({
                'url':'https://www.receitaws.com.br/v1/cnpj/' + cnpj.replace(/[^0-9]/g, ''),
                'type':"GET",
                'dataType':'jsonp',
                'success':function(data){
                    if(data.nome == undefined){
                        alert(data.status + ' ' + data.message)
                    } else {
                        document.getElementById('razaosocial').value = data.nome;
                        document.getElementById('fantasia').value = data.fantasia;
                        document.getElementById('logradouro').value = data.logradouro;
                        document.getElementById('numero').value = data.numero;
                        document.getElementById('municipio').value = data.municipio;
                        document.getElementById('uf').value = data.uf;
                    }
                    
                }

        })   
    }

</script>


</body>
</html>