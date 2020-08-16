@extends('app.iframe')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col msg-window-container">
                <div class="card" id="msgWindow">
                    <div class="card-header"><span class="card-title">Chat with Customer Support Agent</span></div>
                    <div class="card-body" id="msgs">
                        <div class="msg to">Hello! How can I assist you today?</div>
                    </div>
                    <div class="card-footer">
                        <div class="input-group" id="msgForm" data-sender="me">
                            <input class="form-control" type="text" placeholder="Type message and hit [Enter] to send."/>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <style type="text/css">
        #msgWindow {
            margin-top: 20px;
        }

        #msgs {
            margin: 0px 25px;
            min-height: 200px;
            display: flex;
            flex-flow: column nowrap;
            justify-content: flex-end;
            align-items: flex-start;
        }

        .msg {
            margin: 5px 0;
            border: 1px solid silver;
            padding: 3px 7px;
            display: inline-block;
            position: relative;
            border-radius: 10px;
        }
        .msg::before, .msg::after {
            content: '';
            display: inline-block;
            bottom: 0;
            position: absolute;
            border: 1px solid silver;
        }
        .msg::before {
            right: -20px;
            width: 15px;
            height: 15px;
            border-radius: 10px;
        }
        .msg::after {
            right: -35px;
            width: 10px;
            height: 10px;
            border-radius: 5px;
        }
        .msg.from {
            align-self: flex-end;
        }
        .msg.to {
            align-self: flex-start;
        }
        .msg.to::before {
            right: inherit;
            left: -20px;
        }
        .msg.to::after {
            right: inherit;
            left: -35px;
        }
        .msg.typing {
            color: silver;
        }

        #msgForm input:focus, #msgForm button:focus {
            box-shadow: none;
        }

    </style>

    <div class="container-fluid pt-3 pb-3" ng-controller="ProductCTRL">

        <div class="row">

            <div class="col-md-12">

                <div class="alert alert-success">

                    Give your counter-offer
                </div>

            </div>
            <div class="col-md-8">

                <div class="form-group">

                   <input type="text" class="form-control" placeholder="Enter (USD)">
                </div>

            </div>
            <div class="col-md-4">

                <div class="form-group">

                    <button type="button" class="form-control" ng-click="getInstantCheckResult()">Next</button>

                </div>

            </div>

        </div>


    </div>


@endsection

