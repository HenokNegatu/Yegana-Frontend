<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function generateToken($length = 20) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $token = '';
            $max = strlen($characters) - 1;
            
            for ($i = 0; $i < $length; $i++) {
                $token .= $characters[mt_rand(0, $max)];
            }
            
            return $token;
        }
        
        // Example usage:
        $token = generateToken();
        echo $token;
        
    ?>
</body>
</html>