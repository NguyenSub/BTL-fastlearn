const replyCmt = async (Ele) => {
    // Lấy thẻ cha .comment
    const fatherTag = Ele.closest('.comment');
    const existingReply = fatherTag.nextElementSibling; // Lấy phần tử ngay sau thẻ comment
    if (existingReply && existingReply.classList.contains('reply-cmt')) {
        // Nếu thẻ phản hồi đã tồn tại, không làm gì cả
        return;
    }

    const replyHtml = `
<div class="reply-cmt">
                        <div class="line"></div>
                        <div style="display: block;" class="ctn-action-cmt">
                            <form action="" class="row">
                                <img src="../assets/img/SV.jpeg" alt="" srcset="">
                                
                                <div class="row w-100pc center-x relative">
                                    <textarea name="" id="" rows="3" placeholder="Bình luận dưới tên Phùng Thành Đạt"></textarea>
                                    <button type="submit"><span class="material-symbols-outlined">
                                        send
                                        </span></button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
    
    `
//     // Tạo nội dung của thẻ phản hồi mới
//     const replyHtml = `
// <div class="reply-cmt">
//                         <div class="line"></div>
//                         <div class="comment row">
//                             <img src="../assets/img/GV2.jpg" alt="" srcset="">
//                             <div class="main-content col">
//                                 <div class="info">
//                                     <b class="name">Đặng Thế Vinh</b>
//                                     <p class="message">Cảm ơn em rất nhiều 😍</p>
//                                 </div>
//                                 <div class="sub-detail row">
//                                     <p>16 giờ</p>
//                                     <a href="">Thích</a>
//                                     <a href="">Phản hổi</a>
//                                 </div>
//                             </div>
//                         </div>
//                     </div>
//     `;

    // Chèn thẻ phản hồi ngay sau thẻ comment
    fatherTag.insertAdjacentHTML('afterend', replyHtml);
};