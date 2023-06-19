<html>

<head>
    <title>Sertifikat</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .bg {
            position: absolute;
            /* The image used */
            background-image: url("<?php echo $template_sertifikat ?>");

            /* Full height */
            height: 100%;
            width: 100%;

            /* Center and scale the image nicely */
            background-position: center top;
            background-repeat: no-repeat;
            background-size: cover;
            z-index: -1;
            /* flex: 1;
            align-items: center;
            justify-content: center; */
        }

        .container {
            position: relative;
            height: 100%;
        }

        .child {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <div class="bg">
        <div class="container">
            <div class="child">
                <h1 style="text-align: center;"><span style="color: #000080;"><em>Certificate of Completion</em></span></h1>
                <h3 style="text-align: center;"><strong>This certificate is proudly presented to</strong></h3>
                <h2 style="text-align: center;"><?php echo $nama ?></h2>
                <h3 style="text-align: center;"><strong>as a participant</strong></h3>
                <h4 style="text-align: center;"><strong>Fos successfully completing</strong></h4>
                <h4 style="text-align: center;"><strong><span style="color: #000080;"><?php echo $judul ?></span></strong></h4>
                <h4 style="text-align: center;"><span style="color: #ff0000;">Sekolah Tinggi Informatika &amp; Komputer Indonesia</span></h4>
            </div>
        </div>
        <!-- <table style="width: 100%; border-collapse: collapse; border-style: solid; border-color: #000080;" border="20">
            <tbody>
                <tr>
                    <td style="width: 100%; padding: 20px;">
                        <table style="height: 18px; width: 100%; border-collapse: collapse; border-color: #000080;" border="5">
                            <tbody>
                                <tr style="height: 18px;">
                                    <td style="width: 100%; height: 18px;">
                                        <h1 style="text-align: center;"><span style="color: #000080;"><em>Certificate of Completion</em></span></h1>
                                        <h3 style="text-align: center;"><strong>This certificate is proudly presented to</strong></h3>
                                        <h2 style="text-align: center;"></h2>
                                        <h3 style="text-align: center;"><strong>as a participant</strong></h3>
                                        <h4 style="text-align: center;"><strong>Fos successfully completing</strong></h4>
                                        <h4 style="text-align: center;"><strong><span style="color: #000080;"></span></strong></h4>
                                        <h4 style="text-align: center;"><span style="color: #ff0000;">Sekolah Tinggi Informatika &amp; Komputer Indonesia</span></h4>
                                        <p>&nbsp;</p>
                                        <table style="width: 100%; border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 100%; text-align: center;"><span style="color: #000000;">Penyelengara</span></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 100%; text-align: center;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 100%; text-align: center;"><span style="color: #000000;"></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table> -->
    </div>
</body>

</html>