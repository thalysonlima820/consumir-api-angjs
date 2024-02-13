<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- IMPORTAR ANGULAR -->
    <script src="js/angularjs/angularjs.js"></script>
    <!-- IMPORTAR JQUERI -->
    <script src="js/JQuery.js"></script>
</head>
<body>



<div ng-app="myApp" ng-controller="myCtrl">
    <ul>
        <li ng-repeat="usuario in usuarios">{{ usuario.id }} - {{usuario.nome}} - {{ usuario.email }} </li>
    </ul>
    <ul>
        <li ng-repeat="produto in produtos">{{ produto.id }} - {{produto.titulo}} - {{ produto.preco }} </li>
    </ul>

	<button type="button" ng-click="adiciona()">Adicionar</button>

	<p>{{ retorno.id ? '['+ retorno.id +'] inseriodo com sucesso' : 'erro ao adicionar!' }}</p>



    <form action="index.php">
    <input type="number" ng-model="produtoId">
    <button ng-click="apagar()">apagar</button>
    </form>



    <p>{{frase}}</p>


</div>



<script src="js/main.js"></script>
<script>
    angular.module('myApp', [])
        .controller('myCtrl', function ($scope, $http) {
			$scope.util = new Util;

			$scope.util.haddleHttp('GET', 'http://localhost:8080/v1/usuarios/lista').then(function (retorno) {
                $scope.usuarios = retorno;
                $scope.$digest();
            });
			$scope.util.haddleHttp('GET', 'http://localhost/slim_api/public/api/v1/produtos/lista').then(function (retorno) {
                $scope.produtos = retorno;
                $scope.$digest();
            });
            
			$scope.adiciona = () => {
				$scope.util.haddleHttp('POST', 'http://localhost/slim_api/public/v1/usuarios/adicionar', {
					'nome': 'fulado',
					'email': 'email@domain.com',
					'senha': 'JF)(#FJ#'
				}).then(function (retorno) {
					$scope.retorno = retorno;
					$scope.$digest();
				});
			}
            $scope.apagar = () => {
                $scope.util.haddleHttp('get', 'http://localhost:8080/api/v1/produtos/remove/' + $scope.produtoId).then(function (retorno) {
                    $scope.retorno = retorno;
                    $scope.$digest();
                });
            }

            $scope.util.haddleHttp('GET', 'https://baconipsum.com/api/?type=all-meat&sentences=1').then(function(retorno) {
                $scope.frase = retorno;
                $scope.$digest();
            });


			
        });
</script>
</body>
</html>
