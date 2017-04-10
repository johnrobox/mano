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
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo base_url();?>js/lib/jquery.min.js"></script>
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
                          $scope.states = data;
                        })
                        .error(function(data, status, headers, config) {
                    });
                    $scope.state = 'AL';
                    $scope.reset = function () {
                        $scope.state = undefined;
                    };
                }]);
                
            })();
        </script>
        <?php } ?>
        
        <script src="<?php echo base_url();?>js/accounting/custom.js"></script>
    </body>
</html>