<?php
declare(strict_types=1);
/**
 * @Elightwalk Technology.
 * @website https://elightwalk.com
 **/

namespace Elightwalk\SampleCommand\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    const IDENTIFIER_ARGUMENT = 'identifier';

    const TITLE_OPTION = 'title';

    /**
     * @var \Magento\Cms\Model\PageFactory
     */
    protected $_pageFactory;
 
    /**
     * Construct
     *
     * @param \Magento\Cms\Model\PageFactory $pageFactory
     */

    public function __construct(
        \Magento\Cms\Model\PageFactory $pageFactory,
        ?string $name = null)
    {
        $this->_pageFactory = $pageFactory;

        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName('create:cms_page')
            ->setDescription('Creates a cms page')
            ->setDefinition([
                new InputArgument(
                    self::IDENTIFIER_ARGUMENT,
                    InputArgument::REQUIRED,
                    'identifier'
                ),
                new InputOption(
                    self::TITLE_OPTION,
                    '-t',
                    InputOption::VALUE_OPTIONAL,
                    'Title'
                ),
            ]);
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {

            $title = $input->getOption(self::TITLE_OPTION);
            $identifier = $input->getArgument(self::IDENTIFIER_ARGUMENT);
            
            // Logic for Create Page.
            $page = $this->_pageFactory->create();
                $page->setTitle($title)
                    ->setIdentifier($identifier)
                    ->setIsActive(true)
                    ->setPageLayout('1column')
                    ->setStores(array(0))
                    ->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit.')
                    ->save();
            // END   
            $output->write('CMS Page is created with identifier, ' . $input->getArgument(self::IDENTIFIER_ARGUMENT));
        } catch (\Exception $ex) {
            $output->writeln('Something went wrong in the code:');
            $output->writeln('Exception: ' . $ex->getMessage());
        } 
    }
}