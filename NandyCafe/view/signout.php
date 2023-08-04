<?php
        session_unset();
        session_destroy();
        //exit;

?>

<div class="container text-center mt-5">
<div class="d-flex align-items-center justify-content-center"

style="

padding-top: 40px;

padding-bottom: 40px;

left: 50%;

top: 50%;

"

>
    
            <div class="alert alert-success my-5 p-5">
                <h3 class="display-4">
                    <i class="fa fa-alert"></i>
                  You have been signed out successfully.
                    </h3>

                       

                <p class="mt-5">


                        <a class="btn btn-danger rounded-pill " href="?p=home">
                            <span class="px-2">
                                Back to Home
                            </span>
                        </a>
                      
                        
                </p>
            </div>

</div>
</div>