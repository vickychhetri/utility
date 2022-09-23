<html>
<head>
    <title>{{$data["subject"]}} | {{$data["updateMail"]}} </title>
    <meta charset="UTF-8">
    <meta name="description" content="CT Group of Institutions">
    <meta name="keywords" content="CT Group of Institutions">
    <meta name="author" content="Vicky Chhetri">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

</body>

<h4>Hey {{$data['name']}},</h4>
 <hr/>
<table width="100%">
    <tbody>
        <tr>
            <td>
                <blockquote>
                    {{!! $data['message'] !!}}
                </blockquote>
                <p><strong> CT Group of Institutions .</strong></p>
            </td>
        </tr>
    </tbody>
</table>



</body>

</html>