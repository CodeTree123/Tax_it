var data = { 
                "team": [
                    {  
                        "imgPath": "assets/img/team/Najmul.jpg", 
                        "name": "Sayed Najmul Hossain",
                        "education": "B.Com (Hon's)",
                        "designation": "Chairman"
                    }
                    ,  
                    {
                        "imgPath": "assets/img/team/Rajib.jpg",
                        "name": "Engr. Md. Rajib Ahmed",
                        "education": "B.Sc. Eng. (Civil & Environmental, SUST), MBA, FIEB",
                        "designation": "Managing Director and CEO"
                    }
                    ,  
                    {
                        "imgPath": "assets/img/team/Engr.-Syed-Tasnem-Mahmood_Director.jpg",
                        "name": "Engr. Syed Tasnem Mahmood",
                        "education": " B.Sc. Eng. (Civil & Environmental, SUST), MIEB",
                        "designation": "Director"
                    }
                    ,
                    {
                        "imgPath": "assets/img/team/Dr. Khokon Debnath.jpg",
                        "name": "Dr. Khokon Debnath",
                        "education": "",
                        "designation": "Advisor"
                    }
                    ,
                    {
                        "imgPath": "assets/img/team/Krishibid Md. Anwar Hossain.jpg",
                        "name": " Krishibid Md. Anwar Hossain",
                        "education": "",
                        "designation": "Advisor"
                    }
                    ,
                    {
                        "imgPath": "assets/img/team/Syeed-Jesan-Mahmood-Head-of-Marketing-min-scaled.jpg",
                        "name": "Syeed Jesan Mahmood",
                        "education": "",
                        "designation": "Head Of Marketing & Brand Development"
                    }
                    ,
                    {
                        "imgPath": "assets/img/team/Biplab.jpg",
                        "name": "Md. Biplab Hossain",
                        "education": "",
                        "designation": " Sr. Executive (Accounts & Admin)"
                    }
                    ,
                    {
                        "imgPath": "assets/img/team/Zubair.JPG",
                        "name": " Engr. Syed Zubair Bin Hasan",
                        "education": "B.Sc. (Textile Engineering)",
                        "designation": "Asst. Manager, Operations"
                    }
                    ,
                     
                    {
                        "imgPath": "assets/img/team/Abdul_ALi.JPG",
                        "name": "  Abdul Ali",
                        "education": "",
                        "designation": "Supervisor, Service dept."
                    }
                    ,
                    {
                        "imgPath": "assets/img/team/Farhad.jpg",
                        "name": "Farhad Hossain Milon",
                        "education": "Diploma-in-Electrical Engineering",
                        "designation": "Junior Engineer"
                    }
                    ,
                    {
                        "imgPath": "assets/img/team/Nazmul.jpg",
                        "name": "Nazmul Hawlader Razu",
                        "education": "Diploma-in-Environmental Engineering",
                        "designation": "Junior Engineer"
                    }
                    ,
                    {
                        "imgPath": "assets/img/team/Shuvo.jpg",
                        "name": "Md Shuvo Mollah",
                        "education": "Diploma-in-Electrical Engineering",
                        "designation": "Junior Engineer"
                    }
                    ,
                    {
                        "imgPath": "assets/img/team/Masud (2).jpg",
                        "name": "Md. Masud Rana",
                        "education": "",
                        "designation": "Senior Technician"
                    }
                    ,
                    {
                        "imgPath": "assets/img/team/Nayeem.JPG",
                        "name": "Md. Nayeem Hossain",
                        "education": "",
                        "designation": "Senior Technician"
                    }
                    ,
                    {
                        "imgPath": "assets/img/team/Amir.jpg",
                        "name": "Amir Hossain",
                        "education": "",
                        "designation": " Senior Technician"
                    }
                    ,
                    {
                        "imgPath": "assets/img/team/Rakib.jpg",
                        "name": "Riaz Hossain ",
                        "education": "",
                        "designation": "Technician cum Support Staff "
                    }
                    ,
                    {
                        "imgPath": "assets/img/team/Md. Rakibul Islam.jpg",
                        "name": " Md. Rakibul Islam",
                        "education": "",
                        "designation": " Driver"
                    }
                   

                ]
             }      



             
var team_row = document.querySelector('.team_row'); 
var teamList = data.team;  
var layout = ``;
 

for (var team in teamList) {

    var imgPath = teamList[team].imgPath;
    var name =  teamList[team].name;
    var education =  teamList[team].education; 
    var designation =  teamList[team].designation; 

    console.log(imgPath); 
    

    layout +=  ` 
                 <div class="col-lg-4 col-md-4 col-sm-12 col-12 py-2 my-5">
                    <div class="team-container shadow mx-auto  p-3" > 
                           <img src="${imgPath}" alt="Team Member" class="team-image img-fluid rounded-top"> 
                        <div class="team-overlay   d-flex flex-column align-items-center p-2">
                           <div class="team-text ">
                              <h5 class="fw-bolder  text-center">${name}</h5> 
                              <p class="education fw-bolder text-center mb-0">${education}</p> 
                              <p class="designation fw-bolder text-center mb-0">${designation}</p>
                            </div>
                        </div>
                      </div>        
                </div>   
    ` 
 
    
  } 
  team_row.innerHTML = layout;
 


 