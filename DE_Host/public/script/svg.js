(function(){var o,a,e,l;l=new Snap(".logoholder"),o=$(".logoholder").width()/2,a=$(".logoholder").height(),e=l.circle(o,a/2,a/2+15),e.attr({fill:"#000000",opacity:1}),e.animate({r:0,opacity:0},2e3,mina.easeinout),Snap.load("/assets/logo/logo.svg",function(o){var a;return a=o,l.append(a),l.append(e)})}).call(this);