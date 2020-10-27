<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 
        <table cellpadding="0" cellspacing="0" width="640" align="center" border="1">     
        <thead>              
        <tr>                     
            <th scope="col">Status</th>
            <th scope="col">Type</th>
            <th scope="col">Reference</th>
            <th scope="col">Description</th>
            <th scope="col">Amount</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>                
        </tr>   
    </thead>           
                   
       <tbody>              
        <tr>                     
        
            <td>
                {{$transaction->status}}
            </td>
            
            <td>
                {{$transaction->payment_type}}
            </td>
            <td>
              {{$transaction->reference}}
            </td>
            <td>
              {{$transaction->description}}
           </td>
            <td>${{$transaction->amount}}</td>
            <td>{{$transaction->created_at}}</td>               
        </tr>             
    </tbody>        
        
        </table> 
 
</body>
</html>