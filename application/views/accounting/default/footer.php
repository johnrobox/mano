                </div>
            </div>
        </div>

        <footer>
            <div class="container">
               <div class="copy text-center">
                  Copyright 2014 <a href='#'>Website</a>
               </div>
            </div>
        </footer>
        
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url();?>js/lib/bootstrap.min.js"></script>
        
        <!-- THIS IS FOR CASHIER PANEL ONLY -->
        <?php if ($page == 2) { ?>
        <script src="<?php echo base_url();?>js/lib/angularjs/angular.min.js"></script>
        <script src="<?php echo base_url();?>js/accounting/auto-select/customSelect.js"></script>
        <script>
            (function () {
                var app = angular.module('Demo', ['AxelSoft']);

                app.controller('DemoController', ['$scope','$http', function ($scope, $http) {
                        
                    $http.get('<?php echo base_url();?>index.php/api/ProductController/getProductList')
                        .success(function(data, status, headers, config) {
                          $scope.products = data;
                        })
                        .error(function(data, status, headers, config) {
                    });
                    $scope.productSelected = '';
                    $scope.singleProduct = "";
                    $scope.product_quantity = 0;
                    $scope.addProduct = function(){
                        console.log($scope.productQuantity);
                        console.log($scope.productSelected.id);
                        angular.forEach($scope.products, function(e){
                            console.log(e);
                            if (e.id == $scope.productSelected.id) {
                                $scope.singleProduct = e;
                            }
                        });
                    }
                    console.log($scope.productSelected);
                    //$scope.singleProduct = $scope.state;
                    
                    $scope.reset = function () {
                        $scope.productSelected = undefined;
                    };
                    
                    $scope.nums = 0;
                    var number = 0;
                    $scope.change = function() {
                        number++;
                        $("#product_quantity").val(0);
                    }
                    
                }]);
                
            })();
        </script>
        <?php } ?>
        
        <script src="<?php echo base_url();?>js/accounting/custom.js"></script>
    </body>
</html>