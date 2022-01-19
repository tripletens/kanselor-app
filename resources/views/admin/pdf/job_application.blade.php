<html>

<head>
    <title>
        Kiyix Vacancy
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <style type="text/css">
        body {
            background-color: #ffffff;
            color: #000000;
        }

        .header {
            display: flex;
            justify-content: center;
            flex-direction: row;
            margin-bottom: 0px;
        }
        .phone{
            margin-top: 50px;
        }
        .email{
            margin-top: 50px;
        }
        .container{
            margin:0px;
            padding:0px;
        }

        table{
            margin-left:100px;
            margin-right: 100px;
        }
        th{
            text-align: left;
            /*  */
        }
        
    </style>

</head>

<body>
    <div class="container">
        <p style="text-align: right;">Date: {{date('Y-m-d h:i:sa')}}</p>
        <div class="header">
            <img src="{{public_path('images/Kiyix_logo.png')}}" style="height:100px;width:auto;padding:auto;margin-bottom:0px;align:center;margin-left:250px;margin-top:0px;" alt="Kiyix Logo">
        </div>
    </div>
        
    <h2 style="text-align:center;">JOB SEEKER APPLICATION FORM</h2>
    <table class="table">
            <tr style="width:1000px;">
                <th style="width:300px;">
                  Application Code:
                </th>
                <td style="text-align:left;background-color:white;color:green; border:2px solid green;padding:10px; text-align:center;border-radius:20px;margin:30px; font:bolder 24px;">
                    {{ucfirst($job_application[0]->code)}}
                </td>
            </tr>
            <tr style="margin-top:100px;padding:100px;">
                <th>
                  Full Name:
                </th>
                <td>
                    {{ucfirst($job_application[0]->name)}}
                </td>
            </tr>

            <tr style="margin-top:100px;padding:100px;">
                <th>
                  Email Address:
                </th>
                <td>
                    {{ucfirst($job_application[0]->email)}}
                </td>
            </tr>
            <tr style="margin-top:100px;padding:100px;">
                <th>
                  Position:
                </th>
                <td>
                    {{ucfirst($job_application[0]->position)}}
                </td>
            </tr>
            <tr style="margin-top:100px;padding:100px;">
                <th>
                  Date of Birth:
                </th>
                <td>
                    {{niceday($job_application[0]->dob)}}
                </td>
            </tr>
            <tr style="margin-top:100px;padding:100px;">
                <th>
                  Gender:
                </th>
                <td>
                    {{ucfirst($job_application[0]->gender)}}
                </td>
            </tr>
            <tr style="margin-top:100px;padding:100px;">
                <th>
                  Phone Number:
                </th>
                <td>
                    {{$job_application[0]->phone}}
                </td>
            </tr>
            <tr style="margin-top:100px;padding:100px;">
                <th>
                Alternative Phone Number:
                </th>
                <td>
                    {{$job_application[0]->altphone ? $job_application[0]->altphone : "N/A"}}
                </td>
            </tr>
            <tr style="margin-top:100px;padding:100px;">
                <th>
                Next of Kin Phone Number:
                </th>
                <td>
                    {{$job_application[0]->nokphone ? $job_application[0]->nokphone : "N/A"}}
                </td>
            </tr>
            <tr style="margin-top:100px;padding:100px;">
                <th>
                Marital Status:
                </th>
                <td>
                    {{$job_application[0]->marital_status ? ucfirst($job_application[0]->marital_status) : "N/A"}}
                </td>
            </tr>
            <tr style="margin-top:100px;padding:100px;">
                <th>
                Social Media:
                </th>
                <td>
                    {{$job_application[0]->social_media ? $job_application[0]->social_media : "N/A"}}
                </td>
            </tr>
            <tr style="margin-top:100px;padding:100px;">
                <th>
                Salary Expectation:
                </th>
                <td>
                    NGN {{$job_application[0]->salary ? number_format($job_application[0]->salary,2) : "0.00"}}
                </td>
            </tr>
            <tr style="margin-top:100px;padding:100px;">
                <th>
                Residential Address:
                </th>
                <td>
                    {{$job_application[0]->address ? ucwords($job_application[0]->address) : "N/A"}}
                </td>
            </tr>
            <tr style="margin-top:100px;padding:100px;">
                <th>
                Employment History:
                </th>
                <td>
                    {{$job_application[0]->history ? ucwords($job_application[0]->history) : "N/A"}}
                </td>
            </tr>
            <tr style="margin-top:100px;padding:100px;">
                <th>
                Educational Qualification:
                </th>
                <td>
                    {{$job_application[0]->qualification ? ucwords($job_application[0]->qualification) : "N/A"}}
                </td>
            </tr>
            <tr style="margin-top:100px;padding:100px;">
                <th>
                Professional Certification(s):
                </th>
                <td>
                    {{$job_application[0]->qualification ? ucwords($job_application[0]->qualification) : "N/A"}}
                </td>
            </tr>
            <tr style="margin-top:100px;padding:100px;">
                <th>
                Why are you qualified for this Job:
                </th>
                <td>
                    {{$job_application[0]->qualified ? ucwords($job_application[0]->qualified) : "N/A"}}
                </td>
            </tr>

            <tr style="margin-top:100px;padding:100px;">
                <th>
                Referees:
                </th>
                <td>
                    {{$job_application[0]->referees ? ucwords($job_application[0]->referees) : "N/A"}}
                </td>
            </tr>

            <tr style="margin-top:100px;padding:100px;">
                <th>
                Status:
                </th>
                <td>
                    @if ($job_application[0]->status == 1)
                        {{__("Approved")}};
                    @else if($job_application[0]->status == 0)
                        {{__("Rejected")}};
                    @endif

                    @if ($job_application[0]->status != 1 && $job_application[0]->status != 0)
                        {{__("Pending")}};
                    @endif
                </td>
            </tr>
            </tbody>
    </table>
    
</body>

</html>