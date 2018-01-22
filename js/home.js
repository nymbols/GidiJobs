/*
 * GidiJobs
 * Home Tab JavaScript Library
 *
*
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 * $Id: home.js 3548 2007-11-09 23:54:52Z andrew $
 */

function swapHomeGraph(view)
{
    var homeGraphImage = document.getElementById('homeGraph');
    
    homeGraphImage.src = CATSIndexName + "?m=graphs&a=miniPlacementStatistics&width=495&height=230&view=" + view;
}

/* We don't need to mouseover. */

function trackTableHighlight()
{
    return;
}