<?php

function getHtmlSendMailToCustomer($infoSendSupport) {
    return "
    <div style='width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;'>
        <div style='position: relative;width: auto; display: inline-block; background-color: #f0f0f0; padding: 20px; border-top: 10px solid #e90505; color: #1b3d56; font-size: 16px;'>
            <div>
                <p style=' position: absolute;top: -4px;left: 10px; '>
                    <a href='http://capri.vn'>
                        <img src='http://capri.vn/public/images/logo-icon/logo-capri.png' width='130' height='50' alt='Logo công ty Capri'>
                    </a>
                </p>
                <h2 style='text-align: center; margin-bottom: 20px; margin-top: 5px ;font-size: 2.2rem; '>Capri thông báo</h2>
            </div>
            <div>
                <p style='font-size: 1.2rem; margin: 10px 0;'>▪️ <strong>Capri</strong> xin kính chào quý khách hàng: <strong style='text-transform: uppercase;'>".$infoSendSupport['fullname']."</strong></p>
                <p style='font-size: 1.2rem; margin: 10px 0;'>▪️ Đội ngũ nhân viên <strong>Capri</strong> đã nhận được thông tin phản hồi của quý khách.</p>
                <p style='font-size: 1.2rem; margin: 10px 0;'>▪️ Thời gian nhận: ".formatFullTime($infoSendSupport['sendDate'])."</p>
                <p style='font-size: 1.4rem; font-weight: bold; margin: 10px 0;'>Chúng tôi sẽ phản hồi lại yêu cầu của quý khách qua:</p>
                <p style='font-size: 1.2rem; margin: 10px 0;'>▪️ SĐT: <strong>".formatPhone($infoSendSupport['phone'])."</strong></p>
                <p style='font-size: 1.2rem; margin: 10px 0;'>▪️ EMAIL: <strong>".$infoSendSupport['email']."</strong></p>
                <p style='font-size: 1.2rem; margin: 10px 0;'>Trong thời gian ngắn nhất !</p>
                <p style='font-size: 1.4rem; font-weight: bold; margin: 10px 0;'>Mọi thắc mắc xin liên hệ qua các kênh:</p>
                <p style='font-size: 1.2rem; margin: 10px 0;'>
                    <span>▪️ Fanpage FB: </span>
                    <a href='".getInfoSystem()['fanpage_facebook']."' target='_blank '>bepcapri</a>
                </p>
                <p style='font-size: 1.2rem; margin: 10px 0;'>
                    <span>▪️ Zalo: </span>
                    <a href='".getInfoSystem()['zalo']."' target='_blank '>".formatPhone(getInfoSystem()['zalo'])."</a>
                </p>
                <p style='font-size: 1.2rem; margin: 10px 0;'>
                    <span>▪️ Youtube change: </span>
                    <a href='".getInfoSystem()['youtube_change']."' target='_blank '>Capri.vn</a>
                </p>
                <p style='font-size: 1.2rem; margin: 10px 0;'>
                    <span>▪️ Website: </span>
                    <a href='".base_url()."' target='_blank '>capri.vn</a>
                </p>
                <p style='font-size: 1.2rem; '>Đội ngũ <strong>Capri</strong> xin chân thành cảm ơn !</p>
            </div>
        </div>
    </div>";
}

function getHtmlSendMailToStaff($infoSendSupport) {
    return "
    <div style='width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;'>
        <div style='position: relative;width: auto; display: inline-block; background-color: #f0f0f0; padding: 20px; border-top: 10px solid #e90505; color: #1b3d56; font-size: 16px;'>
            <div>
                <p style=' position: absolute;top: -4px;left: 10px; '>
                    <a href='http://capri.vn'>
                        <img src='http://capri.vn/public/images/logo-icon/logo-capri.png' width='130' height='50' alt='Logo công ty Capri'>
                    </a>
                </p>
                <h2 style='text-align: center; margin-bottom: 20px; margin-top: 5px ;font-size: 2.2rem; '>Capri thông báo</h2>
            </div>
            <div>
                <p style='font-size: 1.2rem; margin: 10px 0;'>▪️ Khách hàng: <strong style='text-transform: uppercase;'>".$infoSendSupport['fullname']."</strong></p>
                <p style='font-size: 1.2rem; margin: 10px 0;'>▪️ Đang muốn tư vấn về <strong>".formatTypeSupport($infoSendSupport['type'])."</strong>.</p>
                <p style='font-size: 1.2rem; margin: 10px 0;'>▪️ Nội dung: ".$infoSendSupport['content']."</p>
                <p style='font-size: 1.4rem; font-weight: bold; margin: 10px 0;'>Thông tin về phản hồi khách hàng</p>
                <p style='font-size: 1.2rem; margin: 10px 0;'>▪️ SĐT: <a href='tel:".formatPhone($infoSendSupport['phone'])."'><strong>".formatPhone($infoSendSupport['phone'])."</strong></a></p>
                <p style='font-size: 1.2rem; margin: 10px 0;'>▪️ EMAIL: <a href='mailTo:".$infoSendSupport['email']."'><strong>".$infoSendSupport['email']."</strong></a></p>
                <p style='font-size: 1.2rem; margin: 10px 0;'>▪️ ĐỊA CHỈ: <strong>".$infoSendSupport['address']."</strong></p>
                <p style='font-size: 1.2rem; margin: 10px 0;'>▪️ NGÀY HỎI: <strong>".formatFullTime($infoSendSupport['sendDate'])."</strong></p>
                <p style='font-size: 1.2rem; '>Đội ngũ <strong>Capri</strong> xin chân thành cảm ơn !</p>
            </div>
        </div>
    </div>";
}