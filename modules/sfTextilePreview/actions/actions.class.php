<?php
/**
 * Actions for previewing certain convertions.
 *
 * @package    sfTextileMarkItUpPlugin
 * @subpackage preview
 */
class sfTextilePreviewActions extends sfActions
{
  /**
   * Show the preview of a sent textile string.
   * This is meant to be used on the basic markItUp! iframe.
   *
   * @param sfWebRequest $request
   *
   * @return string
   */
  public function executePreviewTextile(sfWebRequest $request)
  {
    $this->setLayout(false);

    $this->message = sfTextile::doConvert($request->getPostParameter('data'));

    return sfView::SUCCESS;
  }
}