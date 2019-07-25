<?php
/**
 * MessageProvider.php
 *
 * Author: wangyi <chunhei2008@qq.com>
 *
 * Date:   2019-07-25 18:32
 * Copyright: (C) 2014, Guangzhou YIDEJIA Network Technology Co., Ltd.
 */

namespace Chunhei2008\Hyperf\Validation\Contracts\Support;


interface MessageProvider
{
    /**
     * Get the messages for the instance.
     *
     * @return \Illuminate\Contracts\Support\MessageBag
     */
    public function getMessageBag();
}
