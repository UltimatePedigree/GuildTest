<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GuildTest - Landscapes</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('storage/css/landscapes.css')}}">
    </head>
    <body>
        <script src="{{asset('storage/js/jquery-3.5.1.js')}}"></script>
        <script>
            var jsonpath = "{{asset('storage/json/landscapes.json')}}";
        </script>
        <script src="{{asset('storage/js/landscapes.js')}}"></script>

        <div class="flex-center position-ref full-height">

            <div class="content" style="max-width:1024px">

                <div class="imheader flex-container">

                    <div class="headerImage headerItem flex-item">
                        <div>
                            <img src="{{asset('storage/imgs/profile.jpeg') }}" style="width:200px;border-radius:100px;" />
                        </div>
                    </div>

                    <div class="headerDescription headerItem flex-item">
                        <div style="padding:10px;">
                            <div class="photographerName">{name}</div>
                            <div class="headerDescriptionBioLabel">Bio</div>
                            <div class="headerDescriptionBio">{bio}</div>
                        </div>
                    </div>

                    <div class="headerDetails headerItem flex-item">
                        <div style="padding:40px 10px 10px 10px">
                            <div style="font-weight:800;">Phone</div>
                            <div>{phone}</div>
                            <div style="font-weight:800;">Email</div>
                            <div>{email}</div>
                        </div>
                    </div>

                </div>

                <div class="imgallery">

                </div>
            </div>
        </div>
    </body>
</html>