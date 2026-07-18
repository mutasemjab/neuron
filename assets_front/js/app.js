/* ============ LAZY IMAGES + FALLBACK ============ */
function loadImg(img){
  const src=img.getAttribute('data-src');
  if(!src||img.dataset.loaded)return;
  img.dataset.loaded=1;
  img.onerror=()=>img.classList.add('failed');
  img.src=src;
}
const imgObserver=new IntersectionObserver((entries)=>{
  entries.forEach(e=>{if(e.isIntersecting){loadImg(e.target);imgObserver.unobserve(e.target);}});
},{rootMargin:'200px'});
function watchImgs(){document.querySelectorAll('img[data-src]:not([data-loaded])').forEach(i=>imgObserver.observe(i));}
watchImgs();
/* hero images load immediately */
document.querySelectorAll('.hero-bg img[data-src]').forEach(loadImg);

/* ============ HERO LOAD ============ */
const heroSection=document.querySelector('.hero');
if(heroSection){
  window.addEventListener('load',()=>heroSection.classList.add('loaded'));
  setTimeout(()=>heroSection.classList.add('loaded'),400);
}

/* ============ HEADER SCROLL ============ */
const header=document.getElementById('header');
const toTop=document.getElementById('toTop');
window.addEventListener('scroll',()=>{
  const y=window.scrollY;
  if(header)header.classList.toggle('scrolled',y>60);
  if(toTop)toTop.classList.toggle('show',y>600);
});
if(toTop){
  toTop.addEventListener('click',()=>{
    window.scrollTo({top:0,behavior:'smooth'});
  });
}

/* ============ MOBILE MENU ============ */
const burger=document.getElementById('burger');
const mobileMenu=document.getElementById('mobileMenu');
if(burger&&mobileMenu){
  burger.addEventListener('click',()=>{
    const open=mobileMenu.classList.toggle('open');
    document.body.classList.toggle('nav-open',open);
    document.body.style.overflow=open?'hidden':'';
  });
  mobileMenu.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>{
    mobileMenu.classList.remove('open');document.body.classList.remove('nav-open');document.body.style.overflow='';
  }));
}

/* ============ REVEAL ON SCROLL ============ */
const revObserver=new IntersectionObserver((entries)=>{
  entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');revObserver.unobserve(e.target);}});
},{threshold:.12,rootMargin:'0px 0px -60px 0px'});
document.querySelectorAll('.reveal').forEach(el=>revObserver.observe(el));

/* ============ COUNTERS ============ */
function animateCount(el){
  const target=+el.dataset.count;const suffix=el.dataset.suffix||'';
  const dur=1800;const start=performance.now();
  function tick(now){
    const p=Math.min((now-start)/dur,1);
    const ease=1-Math.pow(1-p,3);
    let val=Math.floor(ease*target);
    el.textContent=val.toLocaleString('en-US')+suffix;
    if(p<1)requestAnimationFrame(tick);else el.textContent=target.toLocaleString('en-US')+suffix;
  }
  requestAnimationFrame(tick);
}
const countObserver=new IntersectionObserver((entries)=>{
  entries.forEach(e=>{if(e.isIntersecting){animateCount(e.target);countObserver.unobserve(e.target);}});
},{threshold:.5});
document.querySelectorAll('[data-count]').forEach(el=>countObserver.observe(el));

/* ============ FAQ ============ */
document.querySelectorAll('.faq-item').forEach(item=>{
  const q=item.querySelector('.faq-q');const a=item.querySelector('.faq-a');
  if(item.classList.contains('open'))a.style.maxHeight=a.scrollHeight+'px';
  q.addEventListener('click',()=>{
    const isOpen=item.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(o=>{o.classList.remove('open');o.querySelector('.faq-a').style.maxHeight=null;});
    if(!isOpen){item.classList.add('open');a.style.maxHeight=a.scrollHeight+'px';}
  });
});

/* ============ TESTIMONIALS SLIDER ============ */
const track=document.getElementById('testiTrack');
if(track){
  const slides=track.children.length;
  const nav=document.getElementById('testiNav');
  let cur=0;
  for(let i=0;i<slides;i++){
    const d=document.createElement('span');d.className='testi-dot'+(i===0?' active':'');
    d.addEventListener('click',()=>goTesti(i));nav.appendChild(d);
  }
  function goTesti(i){
    cur=i;track.style.transform=`translateX(${i*100}%)`;
    nav.querySelectorAll('.testi-dot').forEach((d,idx)=>d.classList.toggle('active',idx===i));
  }
  let testiTimer=setInterval(()=>goTesti((cur+1)%slides),6000);
  nav.addEventListener('click',()=>{clearInterval(testiTimer);testiTimer=setInterval(()=>goTesti((cur+1)%slides),6000);});
}

/* ============ LOCATIONS MAP ============ */
const mapFrame=document.getElementById('mapFrame');
if(mapFrame){
  document.querySelectorAll('.loc-card').forEach(card=>{
    card.addEventListener('click',()=>{
      document.querySelectorAll('.loc-card').forEach(c=>c.classList.remove('active'));
      card.classList.add('active');
      const q=encodeURIComponent(card.dataset.map||'');
      mapFrame.src=`https://maps.google.com/maps?q=${q}&t=&z=14&ie=UTF8&iwloc=&output=embed`;
    });
  });
}

/* ============ DOCTOR MODAL (data comes from server-rendered .doc cards) ============ */
const modal=document.getElementById('docModal');
function openDoc(d){
  document.getElementById('mImg').setAttribute('data-label',d.initials||'');
  document.getElementById('mImg').innerHTML=d.img?`<img src="${d.img}" alt="${d.name}" onerror="this.classList.add('failed')" style="width:100%;height:100%;object-fit:cover">`:'';
  document.getElementById('mSpec').textContent=d.spec||'';
  document.getElementById('mName').textContent=d.name||'';
  document.getElementById('mTitle').textContent=d.title||'';
  document.getElementById('mBio').textContent=d.bio||'';
  document.getElementById('mCerts').innerHTML=(d.certs||[]).map(c=>`<li>${c}</li>`).join('');
  document.getElementById('mTags').innerHTML=(d.tags||[]).map(t=>`<span>${t}</span>`).join('');
  modal.classList.add('open');document.body.style.overflow='hidden';
}
if(modal){
  document.querySelectorAll('.doc[data-name]').forEach(el=>{
    el.addEventListener('click',()=>{
      let certs=[],tags=[];
      try{certs=JSON.parse(el.dataset.certs||'[]');}catch(e){}
      try{tags=JSON.parse(el.dataset.tags||'[]');}catch(e){}
      openDoc({
        name:el.dataset.name,
        spec:el.dataset.spec,
        title:el.dataset.title,
        bio:el.dataset.bio,
        img:el.dataset.img,
        initials:el.dataset.initials,
        certs,tags,
      });
    });
  });
  modal.querySelectorAll('[data-close]').forEach(el=>el.addEventListener('click',()=>{
    modal.classList.remove('open');document.body.style.overflow='';
  }));
  document.addEventListener('keydown',e=>{if(e.key==='Escape'){modal.classList.remove('open');document.body.style.overflow='';}});
}

/* ============ SERVICE CARDS -> scroll to detail ============ */
document.querySelectorAll('[data-service]').forEach(el=>{
  el.addEventListener('click',()=>{document.querySelector('.svc-list')?.scrollIntoView({behavior:'smooth'});});
});

/* ============ BOOKING FORM ============ */
const bookForm=document.getElementById('bookForm');
if(bookForm){
  bookForm.addEventListener('submit',async e=>{
    e.preventDefault();
    const submitBtn=bookForm.querySelector('button[type="submit"]');
    submitBtn.disabled=true;
    document.querySelectorAll('.field-error').forEach(el=>el.remove());

    try{
      const token=document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      const res=await fetch(bookForm.action,{
        method:'POST',
        headers:{'X-CSRF-TOKEN':token,'Accept':'application/json'},
        body:new FormData(bookForm),
      });

      if(res.ok){
        bookForm.style.display='none';
        document.getElementById('formSuccess').classList.add('show');
      }else if(res.status===422){
        const data=await res.json();
        Object.entries(data.errors||{}).forEach(([field,messages])=>{
          const input=bookForm.querySelector(`[name="${field}"]`);
          if(input){
            const err=document.createElement('small');
            err.className='field-error';
            err.style.color='#dc2626';
            err.style.display='block';
            err.style.marginTop='4px';
            err.textContent=messages[0];
            input.closest('.field').appendChild(err);
          }
        });
      }
    }catch(err){
      /* network error: allow retry */
    }finally{
      submitBtn.disabled=false;
    }
  });
}

/* ============ HERO PARALLAX (mouse) ============ */
const heroBg=document.querySelector('.hero-bg');
const reduce=window.matchMedia('(prefers-reduced-motion:reduce)').matches;
if(heroBg&&heroSection&&!reduce){
  heroSection.addEventListener('mousemove',e=>{
    const x=(e.clientX/window.innerWidth-.5);
    const y=(e.clientY/window.innerHeight-.5);
    heroBg.style.transform=`scale(1.06) translate(${x*-18}px,${y*-18}px)`;
  });
}
