<footer id="footerContainer" class="container-fluid back-main mt-5">
        <div class="container">
            <div class="row py-4">
                <div id="footerPart1" class="col-6 col-md-4">
                    <div class="row pt-3">
                        <a id="footerLogoText" class="py-0 mt-3 customBlack ubuntuFont" href="{{route('welcome')}}">Presto.it</a>
                    </div>
                    <div id="mottoPDiv" class="row">
                        <p class="ubuntuFont panna fw-bold">{{__('ui.home-title')}}</p>
                    </div>
                    <div class="row mt-2">
                        <div class="col-1">
                            <i class="contactsIcons papaya fa-solid fa-location-dot"></i>
                        </div>
                        <a href="https://www.google.com/maps/place/Aulab+Hackademy/@41.1165848,16.8510527,16.45z/data=!4m5!3m4!1s0x1347e8bcca130e17:0x47ce9d5124576e73!8m2!3d41.1168124!4d16.8501252" target="_blank" class="col-10">
                            <p id="contactsP" class="mb-2 customBlack ubuntuFont">70124 Bari, Italia</p>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <i class="contactsIcons papaya fa-solid fa-envelope"></i>
                        </div>
                        <a href="mailto:info@presto.it" class="col-10">
                            <p id="contactsP" class="mb-2 customBlack ubuntuFont">info@presto.it</p>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <i class="contactsIcons papaya fa-solid fa-phone"></i>
                        </div>
                        <a href="tel: +39 045123456" class="col-10">    
                            <p id="contactsP" class="mb-2 customBlack ubuntuFont">+39 045123456</p>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-3 mt-3">
                    <ul id="footerCategoriesList" class="papaya ubuntuFont">
                        <h6 id="footerCategoriesTitle" class="fw-bold fs-5 pt-4 pb-2">{{__('ui.footer-explore')}}</h6>
                        <li id="footerCategoriesListItem" class="d-flex align-items-center py-1">
                            <a id="footerCategoriesListAnchor" href="{{route('welcome')}}">Home</a>
                            <i id="footerCategoriesListIcon" class="fa-solid fa-circle-arrow-right ms-2 d-none secColor"></i>
                        </li>
                        <li id="footerCategoriesListItem" class="d-flex align-items-center py-1">
                            <a id="footerCategoriesListAnchor" href="{{route('allAnnouncements')}}">{{__('ui.footer-allann')}}</a>
                            <i id="footerCategoriesListIcon" class="fa-solid fa-circle-arrow-right ms-2 d-none secColor"></i>
                        </li>
                        <li id="footerCategoriesListItem" class="d-flex align-items-center py-1">
                            <a id="footerCategoriesListAnchor" href="{{route('createAnnouncement')}}">{{__('ui.footer-addann')}}</a>
                            <i id="footerCategoriesListIcon" class="fa-solid fa-circle-arrow-right ms-2 d-none secColor"></i>
                        </li>
                        <li id="footerCategoriesListItem" class="d-flex align-items-center py-1">
                            <a id="footerCategoriesListAnchor" href="/#ourCategories">{{__('ui.footer-cats')}}</a>
                            <i id="footerCategoriesListIcon" class="fa-solid fa-circle-arrow-right ms-2 d-none secColor"></i>
                        </li>
                        <li id="footerCategoriesListItem" class="d-flex align-items-center py-1">
                            <a id="footerCategoriesListAnchor" href="#">{{__('ui.footer-profile')}}</a>
                            <i id="footerCategoriesListIcon" class="fa-solid fa-circle-arrow-right ms-2 d-none secColor"></i>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-md-3">
                    <ul id="footerInfoList" class="papaya ubuntuFont mt-3">
                        <h6 id="footerInfoTitle" class="fw-bold fs-5 pt-4 pb-2">INFO</h6>
                        <li id="footerInfoListItem" class="d-flex align-items-center py-1">
                            <a id="footerInfoListAnchor" href="#">{{__('ui.footer-aboutus')}}</a>
                            <i id="footerInfoListIcon" class="fa-solid fa-circle-arrow-right ms-2 d-none papaya"></i>
                        </li>
                        <li id="footerInfoListItem" class="d-flex align-items-center py-1">
                            <a id="footerInfoListAnchor" href="#">{{__('ui.footer-contactus')}}</a>
                            <i id="footerInfoListIcon" class="fa-solid fa-circle-arrow-right ms-2 d-none papaya"></i>
                        </li>
                        <li id="footerInfoListItem" class="d-flex align-items-center py-1">
                            <a id="footerInfoListAnchor" href="#">{{__('ui.footer-privacy')}}</a>
                            <i id="footerInfoListIcon" class="fa-solid fa-circle-arrow-right ms-2 d-none papaya"></i>
                        </li>
                        <li id="footerInfoListItem" class="d-flex align-items-center py-1">
                            <a id="footerInfoListAnchor" href="#">{{__('ui.footer-terms')}}</a>
                            <i id="footerInfoListIcon" class="fa-solid fa-circle-arrow-right ms-2 d-none papaya"></i>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-md-2 pe-md-0">
                    <div id="footerAppsSection" class="row mx-0 px-md-0">
                        <ul id="footerAppsLinks" class="papaya ubuntuFont px-md-0 mt-3 ps-0">
                            <h6 id="footerAppsLinksTitle" class="fw-bold fs-5 pt-4 pb-2">APPS</h6>
                            <li id="footerAppsLinksItem" class="d-flex align-items-center py-1">
                                <a id="footerAppsLinksAnchor" href="https://play.google.com/store/apps/" target="_blank">Google Play
                                <i id="footerAppsLinksIcon" class="fa-brands fa-google-play ms-2"></i></a>
                            </li>
                            <li id="footerAppsLinksItem" class="d-flex align-items-center py-1">
                                <a id="footerAppsLinksAnchor" href="https://apps.apple.com/" target="_blank">App Store
                                <i id="footerAppsLinksIcon" class="fa-brands fa-app-store ms-2"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div id="footerSocialsSection" class="row px-md-0 mt-3 mx-0">
                        <h6 id="footerSocialsTitle" class="fw-bold fs-5 pb-2 mb-0 px-0 ubuntuFont papaya">SOCIAL</h6>
                        <div class="col-1 ps-2 pe-3 pe-md-2 pe-lg-3 d-flex justify-content-center">
                            <a href="https://www.facebook.com/" target="_blank" class="socialsAnchors customBlack">
                                <i class="fa-brands fa-facebook ps-0"></i>
                            </a>
                        </div>
                        <div class="col-1 pe-3 pe-md-2 pe-lg-3 d-flex justify-content-center">
                            <a href="https://www.instagram.com/" target="_blank" class="socialsAnchors customBlack">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </div>
                        <div class="col-1 pe-3 pe-md-2 pe-lg-3 d-flex justify-content-center">
                            <a href="https://twitter.com/" target="_blank" class="socialsAnchors customBlack">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </div>
                        <div class="col-1 pe-3 pe-md-2 pe-lg-3 d-flex justify-content-center">
                            <a href="https://it.linkedin.com/" target="_blank" class="socialsAnchors customBlack">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>