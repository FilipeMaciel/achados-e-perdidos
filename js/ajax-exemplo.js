$.ajax({
    url: '/medico/acoesPrescricoes.php',
    type: 'post', //enviando dados para a página /medico/acoesPrescricoes.php utilizando o método $_POST
    dataType: 'json',  //O tipo de dados será um json.
    data: {
        acao: 'notificacaoMed', //cabeçalho da ação
        parametro: valor //caso necessário passar um valor para o php
    },
    success: function (data) {
        //se a página php returnar um json, o método success recebe a respsota do mesmo na variável 'data'
        console.log(data);

    },
    error: function (data) {
        //caso haja algum erro no php em error: é retornado o erro ocorrido e passado este parametro data
        console.log(data);
    }
});
