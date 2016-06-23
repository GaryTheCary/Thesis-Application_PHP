# A holder for the svg content
s = new Snap('.logoholder')
# Identify masks
index_x = $('.logoholder').width()/2
index_y = $('.logoholder').height()
maskOne = s.circle(index_x, index_y/2, index_y/2+15)
maskOne.attr {fill: "#000000", opacity: 1}
maskOne.animate {r: 0, opacity: 0}, 2000, mina.easeinout
Snap.load '/assets/logo/logo.svg', (response)->
	logo = response
	s.append logo
	s.append maskOne
